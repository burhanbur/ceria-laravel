<?php

namespace App\Repositories\Discussion;

use App\Repositories\Discussion\DiscussionRepositoryInterface;
use App\Models\Discussion;

class DiscussionRepository implements DiscussionRepositoryInterface {

    public function getDiscussionByAssignmentAndClass($id_assignment, $id_class)
    {
        return Discussion::where('id_assignment', $id_assignment)->where('id_class', $id_class)->get();
    }

    public function createDiscussion($data)
    {
        return Discussion::create([
            'message' => $data->message,
            'username' => $data->username,
            'name' => $data->name,
            'id_assignment' => $data->id_assignment,
            'id_class' => $data->id_class,
            'date_created' => $data->date_created
        ]);
    }

    public function updateDiscussion($data)
    {
        return Discussion::find($data->id)->update([
            'message' => $data->message,
            'username' => $data->username,
            'name' => $data->name,
            'id_assignment' => $data->id_assignment,
            'id_class' => $data->id_class,
            'date_created' => $data->date_created
        ]);
    }

    public function deleteDiscussionById($id)
    {
        return Discussion::find($id)->delete();
    }
}