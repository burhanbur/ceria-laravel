<?php
namespace App\Services;

use App\Repositories\Grade\GradeRepositoryInterface;
use Illuminate\Http\Request;

class GradeService {

    protected $gradeRepository;

    public function __construct(GradeRepositoryInterface $gradeRepository)
    {
        $this->gradeRepository = $gradeRepository;
    }

    public function getAllGrades() {
        return $this->gradeRepository->getAllGrade();
    }

    public function getGradeById($id) {
        return $this->gradeRepository->getGradeById($id);
    }

    public function createGrade(Request $request) {
        return $this->gradeRepository->createGrade($request, $request);
    }

    public function updateGrade(Request $request) {
        return $this->gradeRepository->updateGrade($request);
    }

    public function deleteGradeById($id) {
        return $this->gradeRepository->deleteGradeById($id);
    }

    public function getGradeBySubmissionId($id_submission) {
        return $this->gradeRepository->getGradeBySubmissionId($id_submission);
    }
}
