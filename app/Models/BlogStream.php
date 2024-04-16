<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogStream extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = [
        'titulo',
        'subtitulo',
        'author',
        'idtema',
        'idcategory',
        'conteudo',
        'status',
        'imgcapa',
        'audiofile',
        'created_at',
        'updated_at',
        'deleted_at',
        'idusuario_inclusao',
        'idusuario_alteracao',
        'idusuario_exclusao',
    ];
}
