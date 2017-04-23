<?php

namespace App\Models;

use App\BaseModel;

class Production extends BaseModel
{
    protected $table = 'production_data';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
}
