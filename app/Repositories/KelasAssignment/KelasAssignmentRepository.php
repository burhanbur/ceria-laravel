<?php
namespace App\Repositories\KelasAssignment;

use App\Models\KelasAssignment;
use App\Repositories\KelasAssignment\KelasAssignmentRepositoryInterface;

class KelasAssignmentRepository implements KelasAssignmentRepositoryInterface {

    public function getAllKelasAssignment()
    {
        return KelasAssignment::all();
    }

    public function getKelasAssignmentById($id)
    {
        return KelasAssignment::find($id);
    }

    public function createKelasAssignment($data)
    {
        return KelasAssignment::create([
            'id_class' => $data->id_class,
            'id_assignment' => $data->id_assignment
        ]);
    }

    public function updateKelasAssignment($data)
    {
        return KelasAssignment::find($data->id)->update([
            'id_class' => $data->id_class,
            'id_assignment' => $data->id_assignment
        ]);
    }

    public function deleteKelasAssignmentById($id)
    {
        return KelasAssignment::find($id)->delete();
    }

    public function getAllKelasAssigmentByKelasId($id)
    {
        return KelasAssignment::where('id_class', $id)->get();
    }
}
