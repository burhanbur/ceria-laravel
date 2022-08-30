<?php
namespace App\Services;

use App\Repositories\Discussion\DiscussionRepositoryInterface;
use Illuminate\Http\Request;

class DiscussionService {

    protected $discussionRepository;

    public function __construct(DiscussionRepositoryInterface $discussionRepository)
    {
        $this->discussionRepository = $discussionRepository;
    }

    public function getDiscussionByAssignmentAndClass($id_assignment, $id_class) {
        return $this->discussionRepository->getDiscussionByAssignmentAndClass($id_assignment, $id_class);
    }

    public function createDiscussion(Request $request) {
        return $this->discussionRepository->createDiscussion($request);
    }

    public function updateDiscussion(Request $request, $id) {
        $request['id'] = $id;
        return $this->discussionRepository->updateDiscussion($request);
    }

    public function deleteDiscussionById($id) {
        return $this->discussionRepository->deleteDiscussionById($id);
    }
}