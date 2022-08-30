<?php

namespace App\Repositories\Indicator;

interface IndicatorRepositoryInterface {
    public function getAllIndicator();
    public function getIndicatorById($id);
    public function createIndicator($data);
    public function updateIndicator($data);
    public function deleteIndicatorById($id);
}