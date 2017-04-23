<?php

namespace App\Models;

use App\BaseModel;

class Product extends BaseModel
{
    //

    public function productTypes()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
}
