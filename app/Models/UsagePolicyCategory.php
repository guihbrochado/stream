<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsagePolicyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'order',
        'title',
        'description'
    ];
}
