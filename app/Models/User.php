<?php

namespace App\Models;

use App\Http\Controllers\apps\RedisController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Address;
use App\Models\Customer;
use App\Models\AboutUser;
use App\Models\TermsAcceptance;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'trader_image_path',
        'cpf',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    
    public function address() {
        return $this->hasOne(Address::class);
    }
    
    public function customer() 
    {
        return $this->hasMany(Customer::class, 'user_id', 'id');
    }
    
    public function about_User() 
    {
        return $this->hasOne(AboutUser::class, 'user_id', 'id');
    }
    
    public function expiryDate() {
        return $this->hasOne(UserFinancialDetail::class, 'user_id', 'id');
    }
    
    public function hasAcceptedTerms(){
        return $this->termsAcceptance()->exists();
    }
    
    public function termsAcceptance() {
        return $this->hasOne(TermsAcceptance::class);
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
    
    public function isAdmin() {
    return $this->can('admin');
}
}
