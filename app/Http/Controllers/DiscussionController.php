<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DiscussionService;

class DiscussionController extends Controller
{
    protected $discussionService;

    public function __construct(DiscussionService $discussionService)
    {
        $this->discussionService = $discussionService;
    }

    public function getDiscussion($id_assignment, $id_class) {
        $discussions = $this->discussionService->getDiscussionByAssignmentAndClass($id_assignment, $id_class);

        return response([
			'success' => true,
			'message' => 'List discussions',
			'data' => $discussions
        ],200);
    }

    public function store(Request $request) {
        $discussion = $this->discussionService->createDiscussion($request);

        if ($discussion) {
			return response()->json([
				'success' => true,
                'message' => 'Item berhasil disimpan',
                'data' => $discussion,
			], 200);
		} else {
			return response()->json([
				'success' => false,
				'message' => 'Item gagal disimpan',
			], 401);
		}
    }

    public function update($id, Request $request) {
        $discussion = $this->discussionService->updateDiscussion($request, $id);

        if ($discussion) {
			return response()->json([
				'success' => true,
				'message' => 'Berhasil diupdate',
			], 200);
		} else {
			return response()->json([
				'success' => false,
				'message' => 'Gagal diupdate',
			], 401);
		}
    }

    public function destroy($id) {
		$discussion = $this->discussionService->deleteDiscussionById($id);
		
    	if ($discussion) {
    		return response()->json([
    			'success' => true,
    			'message' => 'Item berhasil dihapus',
    		], 200);
    	} else {
    		return response()->json([
    			'success' => false,
    			'message' => 'Item gagal dihapus',
    		], 401);
    	}
    }
}
