<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;
    protected $table = 'discussion';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'message',
        'date_created',
        'username',
        'name',
        'id_class',
        'id_assignment'
    ];
}
