<?php

namespace App\Models;

use App\Http\Controllers\apps\RedisController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupervisorGroupMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'supervisor_group_id',
        'user_id'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        /*
        static::retrieved(function ($supervisor_group_member) {            
        });

        static::creating(function ($supervisor_group_member) {            
        });

        static::created(function ($supervisor_group_member) {
        });

        static::updating(function ($supervisor_group_member) {
        });

        static::updated(function ($supervisor_group_member) {
        });

        static::saving(function ($supervisor_group_member) {
        });
        */

        static::saved(function ($supervisor_group_member) {
            RedisController::update_supervisor_members();
        });

        /*
        static::deleting(function ($supervisor_group_member) {
        });
        */

        static::deleted(function ($supervisor_group_member) {
            RedisController::update_supervisor_members();
        });

        /*
        static::replicating(function ($supervisor_group_member) {
        });
        */
    }
}
