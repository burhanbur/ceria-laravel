<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    use HasFactory;
    protected $table = 'bulletin';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'update_date',
        'approval_date',
        'title',
        'content',
        'user_update',
        'isApproved',
        'comment',
        'thumbnail'
    ];
}
