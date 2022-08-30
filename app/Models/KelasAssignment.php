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
        'id_class',
        'id_assignment'
    ];
}
