<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model {

    use HasFactory;

    protected $fillable = ['codigo', 'desconto', 'validade', 'ativo'];

    public function isValid() {
        return $this->ativo && $this->validate >= now();
    }
}
