<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;
    protected $table = 'indicator';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'description'
    ];

    public function grade() {
        return $this->hasMany('App\Models\Grade', 'id_indicator');
    }
 }
