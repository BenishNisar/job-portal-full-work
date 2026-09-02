<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table="users";
protected $fillable = [
    'firstname',
    'lastname',
    'email',
    'phone',
    'mobile_phone',
    'password',
    'gender',
    'date_of_birth',
    'city',
    'country',
    'zip_code',
    'address_line1',
    'address_line2',
    'role_id',
    'organization',
    'profile_img',
];


     public function role()
{
    return $this->belongsTo(Role::class, 'role_id');
}

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getProfileImageUrlAttribute()
{
    if (!empty($this->profile_img) && file_exists(public_path($this->profile_img))) {
        return asset($this->profile_img);
    }

    return asset('assets/profile_images/default.png');
}

public function getBannerImageUrlAttribute()
{
    if (!empty($this->profile_img) && file_exists(public_path($this->profile_img))) {
        return asset($this->profile_img);
    }

    return asset('assets/profile_images/default.png');
}

public function getFullNameAttribute()
{
    return trim(($this->firstname ?? '') . ' ' . ($this->lastname ?? ''));
}
}
