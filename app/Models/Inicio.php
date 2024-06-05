<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inicio extends Model
{
    use HasFactory;
    
    protected $table = 'site_images';
    protected $fillable = ['logo_path', 'cover_path'];
}
