<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TemaService;

class TemaController extends Controller
{
    protected $temaService;

    public function __construct(TemaService $temaService)
    {
        $this->temaService = $temaService;
    }

    public function index() {
		$tema = $this->temaService->getAllTemas();
		return response([
			'success' => true,
			'message' => 'List tema',
			'data' => $tema
		],200);
	}

    public function store(Request $request) {
		$tema = $this->temaService->createTema($request);

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
    	$tema = $this->temaService->getTemaById($id);

    	if($tema) {
    		return response()->json([
    			'success' => true,
    			'message' => 'Detail Tema',
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

    public function update(Request $request) {
		$tema = $this->temaService->updateTema($request);

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
		$tema = $this->temaService->deleteTemaById($id);

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
}
