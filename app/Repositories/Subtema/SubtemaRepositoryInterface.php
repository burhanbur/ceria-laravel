<?php

namespace App\Repositories\Subtema;

interface SubtemaRepositoryInterface {
    public function getAllSubtema();
    public function getSubtemaById($id);
    public function createSubtema($data);
    public function updateSubtema($data);
    public function deleteSubtemaById($id);
    public function getSubtemaByTema($id);
}
