<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_status_id'
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
