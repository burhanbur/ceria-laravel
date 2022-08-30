<?php
namespace App\Services;

use App\Repositories\Document\DocumentRepositoryInterface;
use Illuminate\Http\Request;

class DocumentService {

    protected $documentRepository;

    public function __construct(DocumentRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function getAllDocument() {
        return $this->documentRepository->getAllDocuments();
    }

    public function getDocumentById($id) {
        return $this->documentRepository->getDocumentById($id);
    }

    public function createDocument(Request $request) {
        return $this->documentRepository->createDocument($request);
    }

    public function updateDocument(Request $request) {
        return $this->documentRepository->updateDocument($request);
    }

    public function deleteDocumentById($id) {
        return $this->documentRepository->deleteDocumentById($id);
    }

    public function getDocumentAssignment($id_assignment) {
        return $this->documentRepository->getDocumentByAssignment($id_assignment);
    }

    public function getDocumentSubmission($id_submission) {
        return $this->documentRepository->getDocumentBySubmission($id_submission);
    }

    public function getDocumentBulletin($id_bulletin) {
        return $this->documentRepository->getDocumentByBulletin($id_bulletin);
    }
}
