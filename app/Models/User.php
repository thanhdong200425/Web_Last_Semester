<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use HasFactory, Notifiable, MustVerifyEmailTrait;
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
        'cover_photo'
    ];

    protected $hidden = [
        'password',
        'origin_password',
        'remember_token',
        'refresh_token',
        'is_active',
        
    ];

    public static function authenticateUser($username, $origin_password): bool|User
    {
        $user = User::where('username', $username)->first();
        if ($user) {
            if (password_verify($origin_password, $user->password)) {
                return $user;
            }
        }
        return false;
    }
}
