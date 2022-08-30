<?php
namespace App\Services;

use App\Repositories\Tema\TemaRepositoryInterface;
use Illuminate\Http\Request;

class TemaService {
    protected $temaRepository;

    public function __construct(TemaRepositoryInterface $temaRepository)
    {
        $this->temaRepository = $temaRepository;
    }

    public function getAllTemas() {
        return $this->temaRepository->getAllTema();
    }

    public function gettemaById($id) {
        return $this->temaRepository->getTemaById($id);
    }

    public function createTema(Request $request) {
        return $this->temaRepository->createTema($request);
    }

    public function updateTema(Request $request) {
        return $this->temaRepository->updatetema($request);
    }

    public function deleteTemaById($id) {
        return $this->temaRepository->deleteTemaById($id);
    }
}
