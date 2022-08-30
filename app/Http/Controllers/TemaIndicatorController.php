<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TemaIndicatorService;

class TemaIndicatorController extends Controller
{
    protected $temaIndicatorSevice;

    public function __construct(TemaIndicatorService $temaIndicatorSevice)
    {
        $this->temaIndicatorSevice = $temaIndicatorSevice;
    }

    public function index() {
		$tema = $this->temaIndicatorSevice->getAllTemaIndicators();
		return response([
			'success' => true,
			'message' => 'List tema indicator',
			'data' => $tema
		],200);
	}

    public function store(Request $request) {
		$tema = $this->temaIndicatorSevice->createTemaIndicator($request);

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
    	$tema = $this->temaIndicatorSevice->getTemaIndicatorById($id);

    	if($tema) {
    		return response()->json([
    			'success' => true,
    			'message' => 'Detail Tema Indicator',
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
		$tema = $this->temaIndicatorSevice->updateTemaIndicator($request);

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
		$tema = $this->temaIndicatorSevice->deleteTemaIndicatorById($id);

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

    public function getTemaIndicatorByTemaSubtema($id_tema, $id_subtema) {
        $tema = $this->temaIndicatorSevice->getTemaIndicatorByTemaSubtema($id_tema, $id_subtema);

    	if($tema) {
    		return response()->json([
    			'success' => true,
    			'message' => 'List Tema Indicator',
    			'data' => $tema
    		], 200);
    	} else {
    		return response()->json([
    			'success' => false,
    			'message' => 'not found',
    			'data' => ''
    		], 401);
    	}
    }
}
