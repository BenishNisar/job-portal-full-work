<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;
    protected $table = 'password_resets';
public $timestamps = false; // kyunke password_resets me usually updated_at nahi hota
    protected $fillable = ['email', 'token', 'created_at'];
}
