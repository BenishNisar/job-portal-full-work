<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corporate extends Model
{
    use HasFactory;
    protected $table = 'corporate';
    protected $fillable = [
        'corporate_id',
        'block_type',
        'content',
        'image',
        'sort_order',
       
    ];
}
