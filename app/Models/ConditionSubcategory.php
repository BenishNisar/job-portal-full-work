<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConditionSubcategory extends Model
{
    use HasFactory;

    protected $table = 'condition_subcategories';

    protected $fillable = [
        'condition_category_id',
        'name',
        'slug',
        'sort_order',
        'is_active',
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
