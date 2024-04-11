<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseEvaluation extends Model
{
    use HasFactory;

    protected $table = 'coursesevaluation';

    protected $fillable = [
        'idcourse',
        'iduser',
        'comment',
        'rate',
    ];
}
