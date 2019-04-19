<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Category extends Model
{

    use Translatable;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'image'
    ];

    /**
     * The Translatable attributes of the category.
     *
     * @var array
     */
    protected $translatable = [
        'name'
    ];

    /**
     * Category has Many Products, so let`s tell eloquent about it.
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
