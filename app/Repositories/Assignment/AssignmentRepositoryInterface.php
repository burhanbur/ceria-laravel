<?php

namespace App\Repositories\Assignment;

interface AssignmentRepositoryInterface {
    public function getAllAssignment();
    public function getAssignmentById($id);
    public function createAssignment($data);
    public function updateAssignment($id, $data);
    public function deleteAssignmentById($id);
    public function safeDeleteAssignmentById($id);
    public function getAllVisibleAssignment();
    public function getAssignmentByTeacher($nip);
}