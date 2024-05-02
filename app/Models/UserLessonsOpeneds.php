<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLessonsOpeneds extends Model
{
    use HasFactory;

    protected $table = 'userlessonsopeneds';

    protected $fillable = [
        'id_order',
        'id_user',
        'id_lesson',
        'currentTime'
    ];
}
