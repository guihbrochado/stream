<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesLessons extends Model {

    use HasFactory;

    protected $table = 'courseslessons';
    protected $fillable = [
        'id_module',
        'lesson',
        'description',
        'lessonnumber',
        'author',
        'link',
        'duration',
        'materials',
        'tags',
        'cover_image',
    ];
}
