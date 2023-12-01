<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'username',
        'password',
        'email',
        'role',
        'phone_number',
        'gender',
        'dob',
        'country',
        'is_active',
        'refresh_token',
        'access_token',
        'facebook',
        'instagram',
        'twitter',
        'tiktok',
        'youtube',
        'remember_token',
        'origin_password',
    ];
}
