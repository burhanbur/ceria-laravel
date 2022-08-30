<?php
namespace App\Services;

use App\Repositories\Assignment\AssignmentRepositoryInterface;
use App\Repositories\Document\DocumentRepositoryInterface;
use Illuminate\Http\Request;

class AssignmentService {

    protected $assignmentRepository;
    protected $documentRepository;

    public function __construct(
        AssignmentRepositoryInterface $assignmentRepository,
        DocumentRepositoryInterface $documentRepository
    ){
        $this->assignmentRepository = $assignmentRepository;
        $this->documentRepository = $documentRepository;
    }

    public function getAllAssignment() {
        return $this->assignmentRepository->getAllAssignment();
    }

    public function getAssignmentById($id) {
        return $this->assignmentRepository->getAssignmentById($id);
    }

    public function createAssignment(Request $request) {
        $assignment = $this->assignmentRepository->createAssignment($request);
        if($request->file('lampiran')) {
            $this->documentRepository->createDocumentAssignment($request, $assignment);
        }
        return $assignment;
    }

    public function updateAssignment($id, Request $request) {
        return $this->assignmentRepository->updateAssignment($id, $request);
    }

    public function deleteAssignmentById($id) {
        return $this->assignmentRepository->deleteAssignmentById($id);
    }

    public function safeDeleteAssigment($id) {
        return $this->assignmentRepository->safeDeleteAssignmentById($id);
    }

    public function getAllVisibleAssignment() {
        return $this->assignmentRepository->getAllVisibleAssignment();
    }

    public function getAssignmentByTeacher($nip) {
        return $this->assignmentRepository->getAssignmentByTeacher($nip);
    }
}