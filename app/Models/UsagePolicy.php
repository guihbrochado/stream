<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsagePolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'usage_policy_category_id',
        'icon',
        'question',
        'answer'
    ];
}
