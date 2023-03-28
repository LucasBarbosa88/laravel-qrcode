<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLinks extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'linkedin_url',
        'github_url'
    ];
}
