<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyClientPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'symbol',
        'account',
        'expert_code',
        'account_balance',
        'account_equity',
        'account_trade_mode',
        'account_trade_allowed',
        'terminal_trade_allowed',
        'mql_trade_allowed',
        'account_trade_expert',
        'account_credit',
        'account_profit',
        'account_margin_mode',
        'account_margin',
        'account_margin_free',
        'account_margin_level',
        'account_name',
        'account_server',
        'account_currency',
        'account_company',
        'remote_adress',
        'position_ticket',
        'position_time',
        'position_type',
        'position_magic',
        'position_reason',
        'position_id',
        'position_volume',
        'position_price_open',
        'position_swap',
        'position_profit',
        'position_sl',
        'position_tp',
        'position_symbol',
        'position_comment'
    ];
}
