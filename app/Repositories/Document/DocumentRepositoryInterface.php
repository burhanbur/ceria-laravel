<?php

namespace App\Repositories\Document;

interface DocumentRepositoryInterface {
    public function getAllDocuments();
    public function getDocumentById($id);
    public function createDocument($data);
    public function updateDocument($data);
    public function deleteDocumentById($id);
    public function createDocumentAssignment($data, $assignment);
    public function getDocumentByAssignment($id_assignment);
    public function createDocumentSubmission($data, $submission);
    public function getDocumentBySubmission($id_submission);
    public function createDocumentBulletin($data, $bulletin);
    public function getDocumentByBulletin($id_bulletin);
}
