<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'district',
        'city',
        'state',
        'user_id'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
