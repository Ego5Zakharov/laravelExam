<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
        'active',
        'balance',
        'cart_id'
    ];

    protected $casts = ['balance' => 'integer'];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }



    protected static function boot()
    {
        parent::boot();

        self::created(function ($user) {
            $cart = new Cart;
            $cart->user_id = $user->id;
            $cart->save();
        });
        self::created(function ($user) {
            $role = Role::query()->where('name', 'user')->first();
            if ($role) {
                $user->roles()->attach($role);
            }
        });
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            return $this->roles()->pluck('name')->intersect($roles)->count() > 0;
        }
        return false;
    }

    public function isAdmin()
    {

        return $this->roles()->where('name', 'admin')->exists();

    }


    public function hasRole(string $roleName)
    {
        return $this->roles()->where('name', $roleName);
    }
}
