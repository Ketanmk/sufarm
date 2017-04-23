<?php

namespace App\Models;

use App\BaseModel;

class ProductType extends BaseModel
{
    public function product()
    {
        return $this->hasMany(Product::class,'product_type_id');
    }
}
