<?php
namespace App\Repositories\Grade;

use App\Models\Grade;
use App\Repositories\Grade\GradeRepositoryInterface;

class GradeRepository implements GradeRepositoryInterface {

    public function getAllGrade()
    {
        return Grade::all();
    }

    public function getGradeById($id)
    {
        return Grade::find($id);
    }

    public function createGrade($submission, $indicator)
    {
        return Grade::create([
            'id_indicator' => $indicator->id,
            'id_submission' => $submission->id
        ]);
    }

    public function updateGrade($data)
    {
        return Grade::find($data->id)->update([
            'id_indicator' => $data->id_indicator,
            'id_submission' => $data->id_submission
        ]);
    }

    public function deleteGradeById($id)
    {
        return $grade = Grade::find($id)->delete();
    }

    public function getGradeBySubmissionId($id_submission)
    {
        return Grade::where('id_submission', $id_submission)->first();
    }
}
