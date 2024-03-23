<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveRoom extends Model {

    use HasFactory;

    protected $fillable = [
        'title',
        'cover',
        'description',
        'is_free',
        'price'
    ];
    
    public function purchases(){
        return $this->hasMany(Purchase::class, 'room_id');
    }
}
