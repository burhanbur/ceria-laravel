<?php
namespace App\Repositories\Submission;

use App\Models\Submission;
use App\Repositories\Submission\SubmissionRepositoryInterface;

class SubmissionRepository implements SubmissionRepositoryInterface {

    public function getAllSubmission()
    {
        return Submission::all();
    }

    public function getSubmissionById($id)
    {
        return Submission::find($id);
    }

    public function createSubmission($data)
    {
        return Submission::create([
            'id_kelas' => $data->id_kelas,
            'id_assignment' => $data->id_assignment,
            'title' => $data->title,
            'description' => $data->description,
            'date_created' => $data->date_created,
            'user_update' => $data->user_update,
            'grade' => $data->grade
        ]);
    }

    public function updateSubmission($data)
    {
        return Submission::find($data->id)->update([
            'id_kelas' => $data->id_kelas,
            'id_assignment' => $data->id_assignment,
            'title' => $data->title,
            'description' => $data->description,
            'date_created' => $data->date_created,
            'user_update' => $data->user_update,
            'grade' => $data->grade
        ]);
    }

    public function deleteSubmissionById($id)
    {
        $submission = Submission::find($id);
        $submission->delete();
        return $submission;
    }

    public function checkSubmission($nis, $id_kelas, $id_assignment) {
        return Submission::where('id_assignment', $id_assignment)->where('user_update', $nis)->where('id_kelas', $id_kelas)->first();
    }
    
    public function getSubmissionByAssigmentId($id_assignment)
    {
        return Submission::where('id_assignment', $id_assignment)->get();
    }

    public function gradingSubmission($data)
    {
        return Submission::find($data->id)->update([
            'grade' => $data->grade
        ]);
    }

    public function getChildSubmission($nis, $id_assignment)
    {
        return Submission::where('user_update', $nis)->where('id_assignment', $id_assignment)->first();
    }
}