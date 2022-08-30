<?php
namespace App\Repositories\TemaIndicator;

use App\Repositories\TemaIndicator\TemaIndicatorRepositoryInterface;
use App\Models\TemaIndicator;

class TemaIndicatorRepository implements TemaIndicatorRepositoryInterface {
    public function getAllTemaIndicator()
    {
        return TemaIndicator::all();
    }

    public function getTemaIndicatorById($id)
    {
        return TemaIndicator::find($id);
    }

    public function createTemaIndicator($data)
    {
        return TemaIndicator::create([
            'description' => $data->description,
            'id_tema' => $data->id_tema,
            'id_subtema' => $data->id_subtema
        ]);
    }

    public function updateTemaIndicator($data)
    {
        return TemaIndicator::find($data->id)->update([
            'description' => $data->description,
            'id_tema' => $data->id_tema,
            'id_subtema' => $data->id_subtema
        ]);
    }

    public function deleteTemaIndicatorById($id)
    {
        return TemaIndicator::find($id)->delete();
    }

    public function getTemaIndicatorByTemaSubtema($id_tema, $id_subtema)
    {
        return TemaIndicator::where('id_tema', $id_tema)->where('id_subtema', $id_subtema)->get();
    }
}
