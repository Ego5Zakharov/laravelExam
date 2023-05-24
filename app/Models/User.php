<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
        'active'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    protected static function boot()
    {
        parent::boot();
        self::created(function ($user) {
            $role = Role::query()->where('name', 'user')->first();
            if ($role) {
                $user->roles()->created_at = now();
                $user->roles()->updated_at = now();
                $user->roles()->attach($role);
            }
        });
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            return $this->roles()->pluck('name')->intersect($roles)->count() > 0;
        }
    }
}
