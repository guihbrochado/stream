<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'room_id',
        'amount',
        'payment_status'
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function liveRoom() {
        return $this->belongsTo(LiveRoom::class, 'room_id');
    }
}
