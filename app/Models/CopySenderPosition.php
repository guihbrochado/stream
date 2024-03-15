<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopySenderPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'account',
        'expert_code',
        'magic_number',
        'position_ticket',
        'position_time',
        'position_type',
        'position_volume',
        'position_price_open',
        'position_profit',
        'position_symbol',
        'position_id'
    ];
}
