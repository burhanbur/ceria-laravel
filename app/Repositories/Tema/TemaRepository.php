<?php
namespace App\Repositories\Tema;

use App\Repositories\Tema\TemaRepositoryInterface;
use App\Models\Tema;

class TemaRepository implements TemaRepositoryInterface {
    public function getAllTema()
    {
        return Tema::all();
    }

    public function getTemaById($id)
    {
        return Tema::find($id);
    }

    public function createTema($data)
    {
        return Tema::create([
            'title' => $data->title,
        ]);
    }

    public function updateTema($data)
    {
        return Tema::find($data->id)->update([
            'title' => $data->title,
        ]);
    }

    public function deleteTemaById($id)
    {
        return Tema::find($id)->delete();
    }
}
