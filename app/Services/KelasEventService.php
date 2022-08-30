<?php
namespace App\Services;

use App\Repositories\KelasEvent\KelasEventRepositoryInterface;
use Illuminate\Http\Request;

class KelasEventService {

    protected $kelasEventRepository;

    public function __construct(KelasEventRepositoryInterface $kelasEventRepository)
    {
        $this->kelasEventRepository = $kelasEventRepository;
    }

    public function getAllClassEvent() {
        return $this->kelasEventRepository->getAllClassEvent();
    }

    public function getClassEventById($id) {
        return $this->kelasEventRepository->getClassEventById($id);
    }

    public function createClassEvent(Request $request) {
        return $this->kelasEventRepository->createClassEvent($request);
    }

    public function updateClassEvent(Request $request) {
        return $this->kelasEventRepository->updateClassEvent($request);
    }

    public function deleteClassEventById($id) {
        return $this->kelasEventRepository->deleteClassEventById($id);
    }
}