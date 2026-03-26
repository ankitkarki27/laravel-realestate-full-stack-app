<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Agent extends Authenticatable implements MustVerifyEmail
{
     use HasFactory, Notifiable;

     protected $fillable = [
        'name',
        'email',
        'photo',
        'password',
        'phone',
        'address',
        'country',
        'state',
        'company',
        'designation',
        'bio',
        'website',
        'facebook',
        'linkedin',
        'tiktok',
        'instagram',
        'license_number',
        'rating',
        'total_properties',
        'token',
        'status',
     ];

     protected $hidden = [
        'password',
        'remember_token',
    ];
}
