<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\StoreTrader;

class CartItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cart_id',
        'store_trader_id',
        'quantity',
        'price',
    ];
    
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    
    public function storeTrader() {
        return $this->belongsTo(StoreTrader:: class, 'store_trader_id');
    }
}
