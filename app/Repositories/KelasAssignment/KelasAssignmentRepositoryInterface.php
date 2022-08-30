<?php

namespace App\Repositories\KelasAssignment;

interface KelasAssignmentRepositoryInterface {
    public function getAllKelasAssignment();
    public function getKelasAssignmentById($id);
    public function createKelasAssignment($data);
    public function updateKelasAssignment($data);
    public function deleteKelasAssignmentById($id);
    public function getAllKelasAssigmentByKelasId($id);
}
