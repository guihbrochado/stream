<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'starred',
        'ticket_category_id',
        'ticket_status_id',
        'user_id',
        'title',
        'description'
    ];
}
