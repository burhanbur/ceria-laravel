<?php
namespace App\Services;

use App\Repositories\Document\DocumentRepositoryInterface;
use App\Repositories\Submission\SubmissionRepositoryInterface;
use App\Repositories\Grade\GradeRepositoryInterface;
use App\Repositories\Indicator\IndicatorRepositoryInterface;
use Illuminate\Http\Request;

class SubmissionService {
    
    protected $submissionRepository;
    protected $documentRepository;
    protected $gradeRepository;
    protected $indicatorRepository;

    public function __construct(
        SubmissionRepositoryInterface $submissionRepository, 
        DocumentRepositoryInterface $documentRepository,
        GradeRepositoryInterface $gradeRepository,
        IndicatorRepositoryInterface $indicatorRepository
    ){
        $this->submissionRepository = $submissionRepository;
        $this->documentRepository = $documentRepository;
        $this->gradeRepository = $gradeRepository;
        $this->indicatorRepository = $indicatorRepository;
    }

    public function getAllSubmissions() {
        return $this->submissionRepository->getAllSubmission();
    }

    public function getSubmissionById($id) {
        return $this->submissionRepository->getSubmissionById($id);
    } 

    public function createSubmission(Request $request) {
        $submission = $this->submissionRepository->createSubmission($request);
        if($request->file('lampiran')) {
            $this->documentRepository->createDocumentSubmission($request, $submission);
        }
        return $submission;
    }

    public function updateSubmission(Request $request) {
        return $this->submissionRepository->updateSubmission($request);
    }

    public function deleteSubmissionById($id) {
        return $this->submissionRepository->deleteSubmissionById($id);
    }

    public function checkSubmissionExists($nis, $id_kelas, $id_assignment) {
        $submission = $this->submissionRepository->checkSubmission($nis, $id_kelas, $id_assignment);
        if($submission) {
            return true;
        } else {
            return false;
        }
    }

    public function getSubmission($nis, $id_kelas, $id_assignment) {
        return $this->submissionRepository->checkSubmission($nis, $id_kelas, $id_assignment);
    }

    public function getSubmissionByAssigmentId($id_assignment) {
        return $this->submissionRepository->getSubmissionByAssigmentId($id_assignment);
    }

    public function gradingSubmission(Request $request) {
        $this->submissionRepository->gradingSubmission($request);
        $indicator = $this->indicatorRepository->createIndicator($request);
        return $this->gradeRepository->createGrade($request, $indicator);
    }

    public function updateGradeSubmission(Request $request, $id_grade) {
        $this->submissionRepository->gradingSubmission($request);
        $grade = $this->gradeRepository->getGradeById($id_grade);
        $data=array("id" => $grade->id, "description" => $request->description );
        return $this->indicatorRepository->updateIndicator($data);
    }

    public function getChildSubmission($nis, $id_assignment) {
        return $this->submissionRepository->getChildSubmission($nis, $id_assignment);
    }
}