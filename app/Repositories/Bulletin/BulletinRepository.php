<?php
namespace App\Repositories\Bulletin;

use App\Models\Bulletin;
use App\Repositories\Bulletin\BulletinRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class BulletinRepository implements BulletinRepositoryInterface {

    public function getAllBulletin()
    {
        return Bulletin::all();
    }

    public function getBulletinById($id)
    {
        return Bulletin::find($id);
    }

    public function createBulletin($data)
    {
        $path = Storage::put(
            'public/file',
            $data->file('thumbnail')
        );

        return Bulletin::create([
            'update_date' => $data->update_date,
            'approval_date' => $data->approval_date,
            'title' => $data->title,
            'content' => $data->content,
            'user_update' => $data->user_update,
            'isApproved' => $data->isApproved,
            'comment' => $data->comment,
            'thumbnail' => $path
        ]);
    }

    public function updateBulletin($data)
    {
        return Bulletin::find($data->id)->update([
            'update_date' => $data->update_date,
            'approval_date' => $data->approval_date,
            'title' => $data->title,
            'content' => $data->content,
            'user_update' => $data->user_update,
            'isApproved' => $data->isApproved,
            'comment' => $data->comment,
            'thumbnail' => $data->thumbnail
        ]);
    }

    public function deleteBulletinById($id)
    {
        return Bulletin::find($id)->delete();
    }

    public function getAllBulletinByApproved($isApproved)
    {
        return Bulletin::where('isApproved', $isApproved)->get();
    }

    public function getBulletinByUsername($user_update)
    {
        return Bulletin::where('user_update', $user_update)->get();
    }
}
