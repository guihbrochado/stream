<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'course',
        'cover',
        'description',
        'status',
        'courselevel',
        'duration',
        'expiration',
        'price',
        'certification',
        'isfree',
        'tags',
    ];
}
