<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $table = 'conditions';

    protected $fillable = [
        'condition_category_id',
        'condition_subcategory_id',
        'title',
        'slug',
        'badge_text',
        'hero_description',
        'hero_image_url',
        'estimated_sessions',
        'stat_one',
        'stat_two',
        'stat_three',
        'causes',
        'symptoms',
        'roadmap_steps',
        'cta_heading',
        'cta_text',
        'cta_button_text',
        'cta_button_link',
        'is_active',
    ];

    protected $casts = [
        'causes' => 'array',
        'symptoms' => 'array',
        'roadmap_steps' => 'array',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(ConditionsCategory::class, 'condition_category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(ConditionSubcategory::class, 'condition_subcategory_id');
    }
}
