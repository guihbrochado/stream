<?php

namespace App\Models;

use App\Http\Controllers\apps\RedisController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
use Illuminate\Support\Facades\Log;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'expert_advisor_id',
        'account_id',
        'lifetime',
        'validity',
        'volume',
        'paused',
        'operation_type_id',
        'leverage',
        'max_volume',
        'max_daily_loss',
        'allowed_symbols'
    ];

    public function accounts()
    {
        return $this->belongsToMany(Account::class);
    }
    
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
