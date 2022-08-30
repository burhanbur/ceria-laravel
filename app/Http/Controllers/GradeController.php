<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GradeService;

class GradeController extends Controller
{
    protected $gradeService;

    public function __construct(GradeService $gradeService)
    {
        $this->gradeService = $gradeService;
    }

    public function index() {
		$grades = $this->gradeService->getAllGrades();
		return response([
			'success' => true,
			'message' => 'List grade',
			'data' => $grades
		],200);
	}

    public function store(Request $request) {
		$grade = $this->gradeService->createGrade($request);

		if ($grade) {
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
    	$grade = $this->gradeService->getGradeById($id);

    	if($grade) {
    		return response()->json([
    			'success' => true,
    			'message' => 'Detail Graded',
    			'data' => $grade
    		], 200);
    	} else {
    		return response()->json([
    			'success' => false,
    			'message' => 'Grade with id '.$id.' not found',
    			'data' => ''
    		], 401);
    	}
    }

    public function update(Request $request) {
		$grade = $this->gradeService->updateGrade($request);

		if ($grade) {
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
		$grade = $this->gradeService->deleteGradeById($id);
		
    	if ($grade) {
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
