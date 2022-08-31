<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teacher';
    protected $primaryKey = 'nomor_pegawai';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
    	'nomor_pegawai',
    	'username',
    	'password',
    	'nama'
    ];

    public function kelas() {
        return $this->hasOne('App\Models\Kelas', 'nomor_pegawai');
    }
}
