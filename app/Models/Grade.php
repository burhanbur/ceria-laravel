<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $table = 'grade';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'id_indicator',
        'id_submission'
    ];

    public function submission() {
        return $this->belongsTo('App\Models\Submission', 'id_submission');
    }

    public function indicator() {
        return $this->belongsTo('App\Models\Indicator', 'id_indicator');
    }
}
