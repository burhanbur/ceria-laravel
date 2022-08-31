<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'class';
    public $timestamps = false;

    protected $fillable = [
    	'id',
    	'kelas',
    	'thn_akademik',
    	'status',
        'nomor_pegawai',
        'foto',
        'deskripsi',
        'periode_awal',
        'periode_akhir'
    ];

    public function kelasAssignment() {
        return $this->hasMany('App\Models\KelasAssignment', 'id_class');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'nomor_pegawai', 'nomor_induk');
    }

    public function teacher() {
        return $this->belongsTo('App\Models\Teacher', 'nomor_pegawai');
    }

    public function childs() {
        return $this->hasMany('App\Models\Child', 'id_kelas');
    }

    public function assignment() {
        return $this->hasMany('App\Models\Assignment', 'id_class');
    }

    public function attendance() {
        return $this->hasMany('App\Models\Attendance', 'id_class');
    }

    public function submission() {
        return $this->hasMany('App\Models\Submission', 'id_kelas');
    }

    public function events() {
        return $this->hasMany('App\Models\KelasEvent', 'id_class');
    }
}
