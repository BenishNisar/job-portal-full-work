<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConditionsCategory extends Model
{
    use HasFactory;

    protected $table = 'condition_categories';

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
        'is_active',
    ];
    public function subcategories()
    {
        return $this->hasMany(ConditionSubcategory::class, 'condition_category_id');
    }
}
