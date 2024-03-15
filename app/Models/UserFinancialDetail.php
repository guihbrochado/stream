<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFinancialDetail extends Model
{
    use HasFactory;
    
    protected $table = 'user_financial_details';
    protected $fillable = [
        'user_id',
        'expiry_date'
    ];
}
