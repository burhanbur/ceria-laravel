<?php

namespace App\Repositories\Tema;

interface TemaRepositoryInterface {
    public function getAllTema();
    public function getTemaById($id);
    public function createTema($data);
    public function updateTema($data);
    public function deleteTemaById($id);
}
