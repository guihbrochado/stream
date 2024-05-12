<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model {

    use HasFactory;

    protected $fillable = ['title', 'description', 'contact_email', 'cover_image', 'team'];
}
