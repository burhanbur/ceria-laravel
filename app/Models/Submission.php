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
        'description',
        'date_created',
        'user_update',
        'grade'
    ];

    public function documents() {
        $this->hasMany('App\Models\Document', 'id_submission');
    }

    public function grade() {
        $this->hasMany('App\Models\Grade', 'id_submission');
    }

    public function assignment() {
        $this->belongsTo('App\Models\Assignment', 'id_assignment');
    }

    public function kelas() {
        $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }
}
