<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveRoomRating extends Model {

    use HasFactory;

    protected $fillable = [
        'liveroom_id',
        'user_is',
        'rating',
        'comment',
    ];
}
