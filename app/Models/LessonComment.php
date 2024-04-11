<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonComment extends Model
{
    use HasFactory;

    protected $table = 'lessoncomments';

    protected $fillable = [     
        'id_lesson',
        'id_user',
        'comment',

    ];
}
