<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
 protected $fillable = [
    'title',
    'short_description',
    'content',
    'featured_image',
    'author',
    'date',
    'category_id',
    'status',
    'slug',
    'meta_title',
    'meta_description'
];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
