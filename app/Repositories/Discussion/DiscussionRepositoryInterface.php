<?php

namespace App\Repositories\Discussion;

interface DiscussionRepositoryInterface {
    public function getDiscussionByAssignmentAndClass($id_assignment, $id_class);
    public function createDiscussion($data);
    public function updateDiscussion($data);
    public function deleteDiscussionById($id);
}