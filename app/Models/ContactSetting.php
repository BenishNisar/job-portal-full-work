<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;
      protected $fillable = ['note','address','phones','emails'];

    protected $casts = [
        'phones' => 'array',
        'emails' => 'array',
    ];
}
