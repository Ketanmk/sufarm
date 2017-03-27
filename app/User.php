<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'created_by', 'updated_by', 'status', 'type'
    ];

    public static function boot()
    {
        parent::boot();

        if (!auth()->check()) {
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function scopeNotMe($query)
    {
        return $query->where('id', '<>', Auth::user()->id);
    }
}
