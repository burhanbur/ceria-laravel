<?php
namespace App\Repositories\Document;

use App\Models\Document;
use App\Repositories\Document\DocumentRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DocumentRepository implements DocumentRepositoryInterface {

    public function getAllDocuments()
    {
        return Document::all();
    }

    public function getDocumentById($id)
    {
        return Document::find($id);
    }

    public function createDocument($data)
    {
        return Document::create([
            'title' => $data->title,
            'location' => $data->location,
            'date_modified' => $data->date_modified,
            'user_upload' => $data->user_upload,
            'type' => $data->type,
            'id_event' => $data->id_event,
            'id_submission' => $data->id_submission,
            'id_assignment' => $data->id_assignment,
            'id_bulletin' => $data->id_bulletin
        ]);
    }

    public function updateDocument($data)
    {
        return Document::find($data->id)->update([
            'title' => $data->title,
            'location' => $data->location,
            'date_modified' => $data->date_modified,
            'user_upload' => $data->user_upload,
            'type' => $data->type,
            'id_event' => $data->id_event,
            'id_submission' => $data->id_submission,
            'id_assignment' => $data->id_assignment,
            'id_bulletin' => $data->id_bulletin
        ]);
    }

    public function deleteDocumentById($id)
    {
        $document = Document::find($id);
        $document->delete();
        return $document;
    }

    public function createDocumentAssignment($data, $assignment)
    {
        $path = Storage::put(
            'public/file',
            $data->file('lampiran')
        );

        return Document::create([
            'title' => $data->file('lampiran')->getClientOriginalName(),
            'location' => $path,
            'date_modified' => $assignment->date_created,
            'type' => 'assignment',
            'id_assignment' => $assignment->id
        ]);
    }

    public function getDocumentByAssignment($id_assignment)
    {
        return Document::where('id_assignment', $id_assignment)->get();
    }

    public function createDocumentSubmission($data, $submission)
    {
        $path = Storage::put(
            'public/file',
            $data->file('lampiran')
        );

        return Document::create([
            'title' => $data->file('lampiran')->getClientOriginalName(),
            'location' => $path,
            'date_modified' => Carbon::now(),
            'type' => 'submission',
            'id_submission' => $submission->id
        ]);
    }

    public function getDocumentBySubmission($id_submission)
    {
        return Document::where('id_submission', $id_submission)->get();
    }

    public function createDocumentBulletin($data, $bulletin)
    {
        $path = Storage::put(
            'public/file',
            $data->file('lampiran')
        );

        return Document::create([
            'title' => $data->file('lampiran')->getClientOriginalName(),
            'location' => $path,
            'date_modified' => Carbon::now(),
            'type' => 'bulletinn',
            'id_bulletin' => $bulletin->id
        ]);
    }

    public function getDocumentByBulletin($id_bulletin)
    {
        return Document::where('id_bulletin', $id_bulletin)->get();
    }
}
