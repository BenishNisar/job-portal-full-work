<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Service extends Model
{
    use HasFactory;
protected $fillable = [
        'title','slug','description','sort_order','is_active','image', // ← image add
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order'=> 'integer',
    ];

    public function scopeActive($q){ return $q->where('is_active',1); }
    public function scopeOrdered($q){ return $q->orderBy('sort_order')->orderBy('id','desc'); }

    // Safe image URL (handles null / absolute / relative)
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('assets/images/service/placeholder.jpg'); // fallback
        }
        if (Str::startsWith($this->image, ['http://','https://','//'])) {
            return $this->image; // absolute URL stored
        }
        return asset($this->image); // relative path → full URL
    }

}
