<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'ea_code',
        'account',
        'deal_ticket',
        'deal_order',
        'deal_time',
        'deal_time_msc',
        'deal_type',
        'deal_entry',
        'deal_magic',
        'deal_reason',
        'deal_position_id',
        'deal_volume',
        'deal_price',
        'deal_commission',
        'deal_swap',
        'deal_profit',
        'deal_fee',
        'deal_sl',
        'deal_tp',
        'deal_symbol',
        'deal_comment',
    ];
}
