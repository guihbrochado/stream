<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AboutUser extends Model
{
    use HasFactory;
    protected $table = 'about_user';
    
    protected $fillable = [
        'user_id',
        'description',
        'experience'
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
