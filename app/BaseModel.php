<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $guarded = ['id'];

    public static function boot(){
        parent::boot();

        if ( ! auth()->check()) {
            return;
        }
        $user_id = auth()->id();

        //created_by & updated_by
        static::creating(function ($model) use ($user_id) {
            $model->created_by = $user_id;
            $model->updated_by = $user_id;
        });

        static::updating(function ($model) use ($user_id) {
            $model->updated_by = $user_id;
        });
    }
}
