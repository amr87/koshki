<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ProductTrait;
use TCG\Voyager\Traits\Translatable;

class Product extends Model
{

    use ProductTrait,Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'image', 'category_id'
    ];

    /**
     * The Translatable attributes of the product.
     *
     * @var array
     */
    protected $translatable = [
        'name'
    ];
}
