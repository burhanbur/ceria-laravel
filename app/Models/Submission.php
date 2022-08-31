<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $table = 'submission';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'id_kelas',
        'id_assignment',
        'title',
        'files',
        'description',
        'date_created',
        'user_update',
        'grade'
    ];

    public function documents() {
        return $this->hasMany('App\Models\Document', 'id_submission');
    }

    public function grade() {
        return $this->hasMany('App\Models\Grade', 'id_submission');
    }

    public function assignment() {
        return $this->belongsTo('App\Models\Assignment', 'id_assignment');
    }

    public function kelas() {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }
}
