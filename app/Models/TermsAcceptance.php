<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsAcceptance extends Model {

    use HasFactory;

    protected $table = 'terms_acceptances';
    protected $fillable = [
        'user_id',
        'terms_version',
        'accepted_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
