<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','year_label','file_path','original_name','mime_type','size_bytes'
    ];

    // Simple helpers
   // Helpers
 public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_download', 'download_id', 'category_id');
    }

    // Helper: comma-separated names
    public function getCategoryNamesAttribute(): string
    {
        return $this->categories->pluck('name')->join(', ');
    }

    public function getUrlAttribute(): string
    {
        return asset($this->file_path);
    }
}
