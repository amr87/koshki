<?php

namespace App\Traits;

// dependencies
use App\Models\Category;

trait ProductTrait
{
    
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
