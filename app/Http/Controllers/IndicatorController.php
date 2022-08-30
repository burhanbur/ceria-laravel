<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\IndicatorService;

class IndicatorController extends Controller
{
    protected $indicatorService;

    public function __construct(IndicatorService $indicatorService)
    {
        $this->indicatorService = $indicatorService;
    }

    public function index() {
		$indicators = $this->indicatorService->getAllIndicator();
		return response([
			'success' => true,
			'message' => 'List indicators',
			'data' => $indicators
		],200);
	}

    public function store(Request $request) {
		$indicator = $this->indicatorService->createIndicator($request);

		if ($indicator) {
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
    	$indicator = $this->indicatorService->getIndicatorById($id);

    	if($indicator) {
    		return response()->json([
    			'success' => true,
    			'message' => 'Detail Indicator',
    			'data' => $indicator
    		], 200);
    	} else {
    		return response()->json([
    			'success' => false,
    			'message' => 'Indicator with id '.$id.' not found',
    			'data' => ''
    		], 401);
    	}
    }

    public function update(Request $request) {
		$indicator = $this->indicatorService->updateIndicator($request);

		if ($indicator) {
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
		$indicator = $this->indicatorService->deleteIndicatorById($id);
		
    	if ($indicator) {
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
