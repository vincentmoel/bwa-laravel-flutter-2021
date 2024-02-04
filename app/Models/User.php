<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function boot()
    {
        parent::boot();

        
        self::creating(function($model){
            $model->password    = Hash::make($model->password); 
        });
        
        self::updating(function ($model) {
            // Check if the password parameter is present in the request
            if ($model->isDirty('password') && !empty($model->password)) {
                $model->password = Hash::make($model->password);
            } else {
                // Remove the password field from the update
                $model->password = $model->getOriginal('password');
            }
        });

    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }
}
