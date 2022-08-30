<?php

namespace App\Repositories\Parents;

interface ParentsRepositoryInterface {
    public function getAllParents();
    public function getParentById($id);
    public function createParent($data);
    public function updateParent($data);
    public function deleteParentById($id);
    public function getParentByUsername($username);
}