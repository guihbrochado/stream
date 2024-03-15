<?php

namespace App\Models;

use App\Http\Controllers\apps\RedisController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_type_id',
        'broker_id',
        'server',
        'account',
        'password',
        'symbols',
        'volume',
        'image'
    ];
    
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function ($supervisor_group_member) {
            RedisController::update_supervisor_members();
        });

        static::deleted(function ($supervisor_group_member) {
            RedisController::update_supervisor_members();
        });
    }
}
