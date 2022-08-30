<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    use HasFactory;

    protected $table = 'raport';
    public $timestamps = false;

    protected $fillable = [
    	'id',
    	'nilai',
    	'date_created',
    	'nis',
        'id_tema',
        'id_subtema',
        'id_indicator'
    ];
}
