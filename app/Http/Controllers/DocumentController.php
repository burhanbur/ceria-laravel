<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DocumentService;

class DocumentController extends Controller
{
    protected $documentService;

    public function __construct(DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    public function index() {
		$documents = $this->documentService->getAllDocument();
		return response([
			'success' => true,
			'message' => 'List teachers',
			'data' => $documents
		],200);
	}

    public function store(Request $request) {
		$documents = $this->documentService->createDocument($request);

		if ($documents) {
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
    	$document = $this->documentService->getDocumentById($id);

    	if($document) {
    		return response()->json([
    			'success' => true,
    			'message' => 'Detail Document',
    			'data' => $document
    		], 200);
    	} else {
    		return response()->json([
    			'success' => false,
    			'message' => 'Document with id '.$id.' not found',
    			'data' => ''
    		], 401);
    	}
    }

    public function update(Request $request) {
		$document = $this->documentService->updateDocument($request);

		if ($document) {
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
		$document = $this->documentService->deleteDocumentById($id);
		
    	if ($document) {
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
