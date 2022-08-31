<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $table = 'assignment';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'date_created',
        'due_date',
        'user_update',
        'date_update',
        'id_teacher',
        'isVisible'
    ];

    public function documents() {
        return $this->hasMany('App\Models\Document', 'id_assignment');
    }

    public function kelasAssignment() {
        return $this->hasMany('App\Models\KelasAssignment', 'id_class');
    }

    public function submission() {
        return $this->hasMany('App\Models\Submission', 'id_assignment');
    }
}
