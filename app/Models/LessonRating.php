<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonRating extends Model
{
    use HasFactory;

    protected $table = 'lessonrating';

    protected $fillable = [
        'id_user',
        'id_lesson',
        'rate',
    ];
}
