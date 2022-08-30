<?php
namespace App\Services;

use App\Repositories\TemaIndicator\TemaIndicatorRepositoryInterface;
use Illuminate\Http\Request;

class TemaIndicatorService {
    protected $temaIndicatorRepository;

    public function __construct(TemaIndicatorRepositoryInterface $temaIndicatorRepository)
    {
        $this->temaIndicatorRepository = $temaIndicatorRepository;
    }

    public function getAllTemaIndicators() {
        return $this->temaIndicatorRepository->getAllTemaIndicator();
    }

    public function getTemaIndicatorById($id) {
        return $this->temaIndicatorRepository->getTemaIndicatorById($id);
    }

    public function createTemaIndicator(Request $request) {
        return $this->temaIndicatorRepository->createTemaIndicator($request);
    }

    public function updateTemaIndicator(Request $request) {
        return $this->temaIndicatorRepository->updateTemaIndicator($request);
    }

    public function deleteTemaIndicatorById($id) {
        return $this->temaIndicatorRepository->deleteTemaIndicatorById($id);
    }

    public function getTemaIndicatorByTemaSubtema($id_tema, $id_subtema) {
        return $this->temaIndicatorRepository->getTemaIndicatorByTemaSubtema($id_tema, $id_subtema);
    }
}
