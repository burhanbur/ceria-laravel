<?php

namespace App\Repositories\Grade;

interface GradeRepositoryInterface {
    public function getAllGrade();
    public function getGradeById($id);
    public function createGrade($submission, $indicator);
    public function updateGrade($data);
    public function deleteGradeById($id);
    public function getGradeBySubmissionId($id_submission);
}
