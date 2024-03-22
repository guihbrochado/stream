<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesModules extends Model
{
    use HasFactory;

    protected $table = 'coursesmodules';

    protected $fillable = [
        'module',
        'modulenumber',
        'id_course',
    ];
}
