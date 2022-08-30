<?php

namespace App\Repositories\Submission;

interface SubmissionRepositoryInterface {
    public function getAllSubmission();
    public function getSubmissionById($id);
    public function createSubmission($data);
    public function updateSubmission($data);
    public function deleteSubmissionById($id);
    public function checkSubmission($nis, $id_kelas, $id_assignment);
    public function getSubmissionByAssigmentId($id_assignment);
    public function gradingSubmission($data);
    public function getChildSubmission($nis, $id_assignment);
}