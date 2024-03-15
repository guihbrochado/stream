<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderError extends Model
{
    use HasFactory;

    protected $fillable = [
        'account',
        'ea_code',
        'ea_port',
        'magic_number',
        'runtime_error_code',
        'trade_server_return_code',
        'symbol'
    ];
}
