<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasEvent extends Model
{
    use HasFactory;
    protected $table = 'class_event';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'id_class',
        'id_event',
        'tanggal',
        'waktu'
    ];

    public function kelas() {
        return $this->belongsTo('App\Models\Kelas', 'id_class');
    }

    public function event() {
        return $this->belongsTo('App\Models\Event', 'id_event');
    }

    public function documents() {
        return $this->hasMany('App\Models\Document', 'id_event');
    }
}
