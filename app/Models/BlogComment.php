<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $table = 'blogcomments';

    protected $fillable = [
        'id_user',
        'id_blog',
        'comment',
    ];
}
