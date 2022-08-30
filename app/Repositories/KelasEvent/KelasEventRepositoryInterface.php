<?php

namespace App\Repositories\KelasEvent;

interface KelasEventRepositoryInterface {
    public function getAllClassEvent();
    public function getClassEventById($id);
    public function createClassEvent($data);
    public function updateClassEvent($data);
    public function deleteClassEventById($id);
}