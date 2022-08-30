<?php
namespace App\Repositories\Indicator;

use App\Models\Indicator;
use App\Repositories\Indicator\IndicatorRepositoryInterface;

class IndicatorRepository implements IndicatorRepositoryInterface {

    public function getAllIndicator()
    {
        return Indicator::all();
    }

    public function getIndicatorById($id)
    {
        return Indicator::find($id);
    }

    public function createIndicator($data)
    {
        return Indicator::create([
            'description' => $data->description
        ]);
    }

    public function updateIndicator($data)
    {
        return Indicator::find($data->id)->update([
            'description' => $data->description
        ]);
    }

    public function deleteIndicatorById($id)
    {
        return $indicator = Indicator::find($id)->delete();
    }
}