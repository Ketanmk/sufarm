<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'created_by', 'updated_by', 'status', 'type',
        'api_token',
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
            $model->api_token  = str_random(60);
        });

        static::updating(function ($model) use ($user_id) {
            $model->updated_by = $user_id;
            if (!$model->api_token) {
                $model->api_token = str_random(60);
            }
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token',
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
