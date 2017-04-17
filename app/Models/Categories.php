<?php

namespace App\Models;

use App\BaseModel;
use App\User;

class Categories extends BaseModel
{
    protected $table   = 'categories';
    protected $appends = [
        'created_at_timestamp',
    ];
    /**
     *
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->status = 1;
        });
        return;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function child()
    {
        return $this->hasMany(self::class, 'category_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'category_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getCreatedAtTimestampAttribute()
    {
        return $this->created_at->timestamp;
    }
}
