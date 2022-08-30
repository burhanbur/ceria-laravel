<?php
namespace App\Services;

use App\Repositories\Indicator\IndicatorRepositoryInterface;
use Illuminate\Http\Request;

class IndicatorService {

    protected $indicatorRepository;

    public function __construct(IndicatorRepositoryInterface $indicatorRepository)
    {
        $this->indicatorRepository = $indicatorRepository;
    }

    public function getAllIndicator() {
        return $this->indicatorRepository->getAllIndicator();
    }

    public function getIndicatorById($id) {
        return $this->indicatorRepository->getIndicatorById($id);
    }

    public function createIndicator(Request $request) {
        return $this->indicatorRepository->createIndicator($request);
    }

    public function updateIndicator(Request $request) {
        return $this->indicatorRepository->updateIndicator($request);
    }

    public function deleteIndicatorById($id) {
        return $this->indicatorRepository->deleteIndicatorById($id);
    }
}