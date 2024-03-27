<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveRoomTag extends Model {

    use HasFactory;

    protected $table = 'liveroom_tags';
    protected $fillable = [
        'tag_name'
    ];

    public function liveRooms() {
        return $this->belongsToMany(LiveRoom::class, 'liveroom_tag_associations', 'tag_id', 'liveroom_id');
    }
}
