<?php

namespace App\Models;

use App\BaseModel;

class Production extends BaseModel
{
    protected $table = 'production_data';
    protected $appends = [
        'created_at_timestamp',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    public function getCreatedAtTimestampAttribute()
    {
        return $this->created_at->timestamp;
    }
}
