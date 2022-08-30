<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtema extends Model
{
    use HasFactory;

    protected $table = 'subtema';
    public $timestamps = false;

    protected $fillable = [
    	'id',
    	'title',
    	'id_tema',
    ];
}
