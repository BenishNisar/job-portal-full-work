<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $table = 'disciplines';

    protected $fillable = [
        'slug',
        'menu_group',
        'menu_title',
        'menu_icon',
        'breadcrumb_title',
        'hero_title',
        'hero_highlight',
        'hero_description',
    ];
}
