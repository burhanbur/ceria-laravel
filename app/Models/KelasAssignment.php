<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasAssignment extends Model
{
    use HasFactory;
    protected $table = 'class_assignment';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'id_class',
        'id_assignment',
    ];

    public function kelas()
    {
    	return $this->belongsTo('App\Models\Kelas', 'id_class');
    }

    public function assignment()
    {
    	return $this->belongsTo('App\Models\Assignment', 'id_assignment');
    }
}
