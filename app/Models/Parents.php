<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $table = 'parent';
    protected $primaryKey = 'nik';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
    	'nik',
    	'username',
    	'password',
    	'nama'
    ];

    public function childs() {
        return $this->hasMany('App\Models\Child', 'nik_parent');
    }
}
