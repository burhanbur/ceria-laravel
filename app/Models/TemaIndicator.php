<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemaIndicator extends Model
{
    use HasFactory;

    protected $table = 'tema_indicator';
    public $timestamps = false;

    protected $fillable = [
    	'id',
    	'description',
    	'id_tema',
    	'id_subtema',
    ];
}
