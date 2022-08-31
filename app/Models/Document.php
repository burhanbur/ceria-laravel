<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'document';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'title',
        'location',
        'date_modified',
        'user_upload',
        'type',
        'id_event',
        'id_submission',
        'id_assignment',
        'id_bulletin'
    ];

    public function event() {
        return $this->belongsTo('App\Models\KelasEvent', 'id_event');
    }

    public function submission() {
        return $this->belongsTo('App\Models\Submission', 'id_submission');
    }

    public function assignment() {
        return $this->belongsTo('App\Models\Assignment', 'id_assignment');
    }
}
