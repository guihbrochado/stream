<?php

namespace App\Models;

use App\Http\Controllers\apps\RedisController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertAdvisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
        'magic_number',
        'name',
        'active',
        'visible',
        'port',
        'allowed_symbols',
        'operation_type_id',
        'default_volume',
        'default_leverage',
        'default_max_volume',
        'default_max_daily_loss',
        'copy_orders',
        'required_balance'
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
