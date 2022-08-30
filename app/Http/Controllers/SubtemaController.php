<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SubtemaService;

class SubtemaController extends Controller
{
    protected $subTemaService;

    public function __construct(SubtemaService $subTemaService)
    {
        $this->subTemaService = $subTemaService;
    }

    public function index() {
		$tema = $this->subTemaService->getAllSubtemas();
		return response([
			'success' => true,
			'message' => 'List Subtema',
			'data' => $tema
		],200);
	}

    public function store(Request $request) {
		$tema = $this->subTemaService->createSubtema($request);

		if ($tema) {
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
    	$tema = $this->subTemaService->getSubtemaById($id);

    	if($tema) {
    		return response()->json([
    			'success' => true,
    			'message' => 'Detail Subtema',
    			'data' => $tema
    		], 200);
    	} else {
    		return response()->json([
    			'success' => false,
    			'message' => 'Subtema with id '.$id.' not found',
    			'data' => ''
    		], 401);
    	}
    }

    public function update(Request $request) {
		$tema = $this->subTemaService->updateSubtema($request);

		if ($tema) {
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
		$tema = $this->subTemaService->deleteSubtemaById($id);

    	if ($tema) {
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

    public function getSubtemaByTema($id) {
        $tema = $this->subTemaService->getSubtemaByTema($id);

    	if($tema) {
    		return response()->json([
    			'success' => true,
    			'message' => 'List Subtema',
    			'data' => $tema
    		], 200);
    	} else {
    		return response()->json([
    			'success' => false,
    			'message' => 'Tema with id '.$id.' not found',
    			'data' => ''
    		], 401);
    	}
    }
}
