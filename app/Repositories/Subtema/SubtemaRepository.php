<?php
namespace App\Repositories\Subtema;

use App\Repositories\Subtema\SubtemaRepositoryInterface;
use App\Models\Subtema;

class SubtemaRepository implements SubtemaRepositoryInterface {
    public function getAllSubtema()
    {
        return Subtema::all();
    }

    public function getSubtemaById($id)
    {
        return Subtema::find($id);
    }

    public function createSubtema($data)
    {
        return Subtema::create([
            'title' => $data->title,
            'id_tema' => $data->id_tema
        ]);
    }

    public function updateSubtema($data)
    {
        return Subtema::find($data->id)->update([
            'title' => $data->title,
            'id_tema' => $data->id_tema
        ]);
    }

    public function deleteSubtemaById($id)
    {
        return Subtema::find($id)->delete();
    }

    public function getSubtemaByTema($id)
    {
        return Subtema::where('id_tema', $id)->get();
    }
}
