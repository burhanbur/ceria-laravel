<?php

namespace App\Http\Controllers;

use App\Services\ChildService;
use Illuminate\Http\Request;
use App\Services\KelasService;

class KelasController extends Controller
{
    protected $kelasService;
    protected $childService;

    public function __construct(KelasService $kelasService, ChildService $childService)
    {
        $this->kelasService = $kelasService;
        $this->childService = $childService;
    }

    public function index() {
		$kelas = $this->kelasService->getAllKelas();
		return response([
			'success' => true,
			'message' => 'List kelas',
			'data' => $kelas
		],200);
	}

    public function store(Request $request) {
		$kelas = $this->kelasService->createKelas($request);

		if ($kelas) {
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
    	$kelas = $this->kelasService->getKelasById($id);
        $childs = $this->childService->getChildByClassId($id);
    	if($kelas) {
    		return response()->json([
    			'success' => true,
    			'message' => 'Detail Kelas',
    			'data' => $kelas,
                'students' => $childs
    		], 200);
    	} else {
    		return response()->json([
    			'success' => false,
    			'message' => 'Kelas with id '.$id.' not found',
    			'data' => ''
    		], 401);
    	}
    }

    public function update(Request $request) {
		$kelas = $this->kelasService->updateKelas($request);

		if ($kelas) {
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
		$kelas = $this->kelasService->deleteKelasById($id);

    	if ($kelas) {
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

	public function getClassByTeacher($id) {
		$kelas = $this->kelasService->getKelasByTeacherId($id);
		return response([
			'success' => true,
			'message' => 'List kelas',
			'data' => $kelas
		],200);
	}
}
