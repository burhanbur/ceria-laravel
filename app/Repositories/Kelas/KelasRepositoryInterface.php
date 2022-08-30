<?php

namespace App\Repositories\Kelas;

interface KelasRepositoryInterface {
    public function getAllKelas();
    public function getKelasById($id);
    public function createKelas($data);
    public function updateKelas($data);
    public function deleteKelasById($id);
    public function getKelasByTeacherId($id);
}