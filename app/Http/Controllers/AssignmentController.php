<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AssignmentService;
use App\Services\DocumentService;
use App\Services\GradeService;
use App\Services\IndicatorService;
use App\Services\KelasAssignmentService;
use App\Services\SubmissionService;
use Carbon\Carbon;

class AssignmentController extends Controller
{
	protected $assignmentService;
	protected $submissionService;
	protected $documentService;
    protected $indicatorService;
    protected $gradeService;
    protected $kelasAssignmentService;

    public function  __construct(
		AssignmentService $assignmentService,
		SubmissionService $submissionService,
		DocumentService $documentService,
        GradeService $gradeService,
        IndicatorService $indicatorService,
        KelasAssignmentService $kelasAssignmentService
	){
		$this->assignmentService = $assignmentService;
		$this->submissionService = $submissionService;
		$this->documentService = $documentService;
        $this->indicatorService = $indicatorService;
        $this->gradeService = $gradeService;
        $this->kelasAssignmentService = $kelasAssignmentService;
    }

    public function index() {
		$assignments = $this->assignmentService->getAllAssignment();
		return response([
			'success' => true,
			'message' => 'List assigment',
			'data' => $assignments
		],200);
	}

    public function store(Request $request) {
		$assignment = $this->assignmentService->createAssignment($request);
        $kelas = $this->kelasAssignmentService->createKelasAssignment($request, $assignment->id);
		if ($assignment && $kelas) {
			return response()->json([
				'success' => true,
                'message' => 'Item berhasil disimpan',
                'data' => $assignment,
			], 200);
		} else {
			return response()->json([
				'success' => false,
				'message' => 'Item gagal disimpan',
			], 401);
		}
    }

    public function show($id) {
    	$assignment = $this->assignmentService->getAssignmentById($id);

    	if($assignment) {
    		return response()->json([
    			'success' => true,
    			'message' => 'Detail Assignment',
    			'data' => $assignment
    		], 200);
    	} else {
    		return response()->json([
    			'success' => false,
    			'message' => 'Assignment with id '.$id.' not found',
    			'data' => ''
    		], 401);
    	}
    }

    public function update($id, Request $request) {
		$assignment = $this->assignmentService->updateAssignment($id, $request);

		if ($assignment) {
			return response()->json([
				'success' => true,
				'message' => 'Berhasil diupdate',
			], 200);
		} else {
			return response()->json([
				'success' => false,
				'message' => 'Gagal diupdate',
			], 401);
		}
    }

    public function destroy($id) {
		$assignment = $this->assignmentService->deleteAssignmentById($id);

    	if ($assignment) {
    		return response()->json([
    			'success' => true,
    			'message' => 'Item berhasil dihapus',
    		], 200);
    	} else {
    		return response()->json([
    			'success' => false,
    			'message' => 'Item gagal dihapus',
    		], 401);
    	}
    }

    public function safeDelete($id) {
        $assignment = $this->assignmentService->safeDeleteAssigment($id);
        if ($assignment) {
    		return response()->json([
    			'success' => true,
                'message' => 'Item berhasil dihapus',
            ], 200);
        }
	}

	public function getListParentAssignment($nis, $id_kelas) {
		$data = array();
        $kelasAssignments = $this->kelasAssignmentService->getAllKelasAssignmentByKelasId($id_kelas);

		foreach($kelasAssignments as $kelasAssignment) {
            $assignment = $this->assignmentService->getAssignmentById($kelasAssignment->id_assignment);
			$isSubmitted = $this->submissionService->checkSubmissionExists($nis, $id_kelas, $assignment->id);
			$isLate = false;
			$collection_date = null;
			$grade = null;

			if($isSubmitted) {
				$submission = $this->submissionService->getSubmission($nis, $id_kelas, $assignment->id);
				$isLate = $assignment->due_date < $submission->date_created ? true : false;
				$collection_date = $submission->date_created;
				$grade = $submission->grade;
			}

			$data[] = array(
				'id' => $assignment->id,
				'title' => $assignment->title,
				'due_date' => $assignment->due_date,
				'isDue' => Carbon::now() > $assignment->due_date ? true : false,
				'isSubmitted' => $isSubmitted,
				'collection_date' => $collection_date,
				'isLate' => $isLate,
				'grade' => $grade
			);
		}

		return response()->json([
			'success' => true,
			'data' => $data
		], 200);
	}

	public function getParentDetailAssignment($nis, $id_kelas, $id_assignment) {
		$assignment = $this->assignmentService->getAssignmentById($id_assignment);
		$submission = $this->submissionService->getSubmission($nis, $id_kelas, $id_assignment);

		if($submission === null) {
			$student_file = null;
		} else {
			$student_file = $this->documentService->getDocumentSubmission($submission->id);
            $grade = $this->gradeService->getGradeBySubmissionId($submission->id);
            $indicator = $this->indicatorService->getIndicatorById($grade->id_indicator);
		}
		$teacher_file = $this->documentService->getDocumentAssignment($assignment->id);

		$data = array(
			'title' => $assignment->title,
			'description' => $assignment->description,
			'due_date' => $assignment->due_date,
			'date_created' => $assignment->date_created,
			'date_updated' => $assignment->date_updated,
			'user_update' => $assignment->id_teacher,
			'date_collect' => $submission === null ? null : $submission->date_created,
			'isDue' => Carbon::now() > $assignment->due_date ? true : false,
			'isSubmitted' => $this->submissionService->checkSubmissionExists($nis, $id_kelas, $id_assignment),
			'student_file' => $student_file,
			'teacher_file' => $teacher_file,
			'grade' => $submission === null ? null : $submission->grade,
            'komentar' => $submission === null ? null : $indicator->description
		);

		return response()->json([
			'success' => true,
			'data' => $data
		], 200);
	}

	public function getTeacherDetailAssignment($nip, $id_assignment) {
		$assignment = $this->assignmentService->getAssignmentById($id_assignment);
		$teacher_file = $this->documentService->getDocumentAssignment($assignment->id);

		$data = array(
			'title' => $assignment->title,
			'description' => $assignment->description,
			'due_date' => $assignment->due_date,
			'date_created' => $assignment->date_created,
			'date_updated' => $assignment->date_updated,
			'user_update' => $assignment->id_teacher,
			'isDue' => Carbon::now() > $assignment->due_date ? true : false,
			'teacher_file' => $teacher_file
		);

		return response()->json([
			'success' => true,
			'data' => $data
		], 200);
	}

	public function getTeacherListAssignment($nip) {
		$data = array();
		$assignments = $this->assignmentService->getAssignmentByTeacher($nip);

		foreach($assignments as $assignment) {
			$isGraded = true;
			$submissions = $this->submissionService->getSubmissionByAssigmentId($assignment->id);

			if(count($submissions) == 0) {
				$isGraded = false;
			} else {
				foreach($submissions as $submission) {
					if($submission->grade === null) {
						$isGraded = false;
						break;
					}
				}
			}


			$data[] = array(
				'id' => $assignment->id,
				'title' => $assignment->title,
				'due_date' => $assignment->due_date,
				'isDue' => Carbon::now() > $assignment->due_date ? true : false,
				'class' => $assignment->id_kelas,
				'isGrade' => $isGraded
			);
		}

		return response()->json([
			'success' => true,
			'data' => $data
		], 200);
	}
}
