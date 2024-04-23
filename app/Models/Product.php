<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'preco',
        'descricao',
        'quantidade',
        'categoria_id',
        'subcategoria_id',
        'informacoes_adicionais',
        'comentarios',
        'imagem'
    ];
    
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }
}
