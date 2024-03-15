<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreTrader extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_company_id',
        'trader',
        'trader_image_path',
        'aux_image_path',
        'active',
        'price'
    ];
    
    public function storeCompany()
    {
        return $this->belongsTo(StoreCompany::class, 'store_company_id');
    }
}
