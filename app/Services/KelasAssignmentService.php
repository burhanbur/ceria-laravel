<?php
namespace App\Services;

use App\Repositories\KelasAssignment\KelasAssignmentRepositoryInterface;
use Illuminate\Http\Request;

class KelasAssignmentService {

    protected $kelasAssignmentRepository;

    public function __construct(KelasAssignmentRepositoryInterface $kelasAssignmentRepository)
    {
        $this->kelasAssignmentRepository = $kelasAssignmentRepository;
    }

    public function getAllKelasAssignment()
    {
        return $this->kelasAssignmentRepository->getAllKelasAssignment();
    }

    public function getKelasAssignmentById($id)
    {
        return $this->kelasAssignmentRepository->getKelasAssignmentById($id);
    }

    public function createKelasAssignment(Request $request, $assignment_id)
    {
        $request['id_assignment'] = $assignment_id;
        return $this->kelasAssignmentRepository->createKelasAssignment($request);
    }

    public function updateKelasAssignment(Request $request)
    {
        return $this->kelasAssignmentRepository->updateKelasAssignment($request);
    }

    public function deleteKelasAssignmentById($id)
    {
        return $this->kelasAssignmentRepository->deleteKelasAssignmentById($id);
    }

    public function getAllKelasAssignmentByKelasId($id_kelas)
    {
        return $this->kelasAssignmentRepository->getAllKelasAssigmentByKelasId($id_kelas);
    }
}
