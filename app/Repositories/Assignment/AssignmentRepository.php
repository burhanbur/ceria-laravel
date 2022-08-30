<?php
namespace App\Repositories\Assignment;

use App\Models\Assignment;
use App\Repositories\Assignment\AssignmentRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AssignmentRepository implements AssignmentRepositoryInterface {

    public function getAllAssignment()
    {
        return Assignment::all();
    }

    public function getAssignmentById($id)
    {
        return Assignment::find($id);
    }

    public function createAssignment($data)
    {
        return Assignment::create([
            'title' => $data->title,
            'description' => $data->description,
            'date_created' => $data->date_created,
            'due_date' => $data->due_date,
            'user_update' => $data->user_update,
            'date_update' => $data->date_update,
            'id_teacher' => $data->id_teacher,
            'isVisible' => $data->is_visible,
            'id_kelas' => $data->id_kelas
        ]);
    }

    public function updateAssignment($id, $data)
    {
        return Assignment::find($id)->update([
            'title' => $data->title,
            'description' => $data->description,
            'date_created' => $data->date_created,
            'due_date' => $data->due_date,
            'user_update' => $data->user_update,
            'date_update' => $data->date_update,
            'id_teacher' => $data->id_teacher,
            'isVisible' => $data->is_visible
        ]);
    }

    public function deleteAssignmentById($id)
    {
        $assignment = Assignment::find($id);
        $assignment->delete();
        return $assignment;
    }

    public function safeDeleteAssignmentById($id)
    {
        $assignment = Assignment::find($id)->update([
            'isVisible' => 0
        ]);
        return $assignment;
    }

    public function getAllVisibleAssignment()
    {
        return Assignment::where('isVisible', '1')->get();
    }

    public function getAssignmentByTeacher($nip)
    {
        return Assignment::where('id_teacher', $nip)->where('isVisible', '1')->get();
    }
}