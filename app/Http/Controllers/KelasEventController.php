<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\KelasEventService;

class KelasEventController extends Controller
{
    protected $kelasEventService;

    public function __construct(KelasEventService $kelasEventService)
    {
        $this->kelasEventService = $kelasEventService;
    }

    public function index() {
		$event = $this->kelasEventService->getAllClassEvent();
		return response([
			'success' => true,
			'message' => 'List classs event',
			'data' => $event
		],200);
	}

    public function store(Request $request) {
		$event = $this->kelasEventService->createClassEvent($request);

		if ($event) {
			return response()->json([
				'success' => true,
				'message' => 'Item berhasil disimpan',
			], 200);
		} else {
			return response()->json([
				'success' => false,
				'message' => 'Item gagal disimpan',
			], 401);
		}
    }

    public function show($id) {
    	$event = $this->kelasEventService->getClassEventById($id);

    	if($event) {
    		return response()->json([
    			'success' => true,
    			'message' => 'Detail Class Event',
    			'data' => $event
    		], 200);
    	} else {
    		return response()->json([
    			'success' => false,
    			'message' => 'Class event with id '.$id.' not found',
    			'data' => ''
    		], 401);
    	}
    }

    public function update(Request $request) {
		$event = $this->kelasEventService->updateClassEvent($request);

		if ($event) {
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
		$event = $this->kelasEventService->deleteClassEventById($id);
		
    	if ($event) {
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
