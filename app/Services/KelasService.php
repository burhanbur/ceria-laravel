<?php
namespace App\Services;

use App\Repositories\Kelas\KelasRepositoryInterface;
use Illuminate\Http\Request;

class KelasService {

    protected $kelasRepository;

    public function __construct(KelasRepositoryInterface $kelasRepository)
    {
        $this->kelasRepository = $kelasRepository;
    }

    public function getAllKelas() {
        return $this->kelasRepository->getAllKelas();
    }

    public function getKelasById($id) {
        return $this->kelasRepository->getKelasById($id);
    }

    public function createKelas(Request $request) {
        return $this->kelasRepository->createKelas($request);
    }

    public function updateKelas(Request $request) {
        return $this->kelasRepository->updateKelas($request);
    }

    public function deleteKelasById($id) {
        return $this->kelasRepository->deleteKelasById($id);
    }

    public function getKelasByTeacherId($id) {
        return $this->kelasRepository->getKelasByTeacherId($id);
    }
}