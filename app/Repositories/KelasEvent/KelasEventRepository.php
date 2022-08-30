<?php
namespace App\Repositories\KelasEvent;

use App\Models\KelasEvent;
use App\Repositories\KelasEvent\KelasEventRepositoryInterface;

class KelasEventRepository implements KelasEventRepositoryInterface {

    public function getAllClassEvent()
    {
        return KelasEvent::all();
    }

    public function getClassEventById($id)
    {
        return KelasEvent::find($id);
    }

    public function createClassEvent($data)
    {
        return KelasEvent::create([
            'id_class' => $data->id_class,
            'id_event' => $data->id_event,
            'tanggal' => $data->tanggal,
            'waktu' => $data->waktu
        ]);
    }

    public function updateClassEvent($data)
    {
        return KelasEvent::find($data->id)->update([
            'id_class' => $data->id_class,
            'id_event' => $data->id_event,
            'tanggal' => $data->tanggal,
            'waktu' => $data->waktu
        ]);
    }

    public function deleteClassEventById($id)
    {
        $classEvent = KelasEvent::find($id);
        $classEvent->delete();
        return $classEvent;
    }
}