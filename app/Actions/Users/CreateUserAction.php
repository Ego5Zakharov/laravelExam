<?php

namespace App\Actions\Users;
use App\Models\User;

class CreateUserAction
{
    public function run(array $attributes): User
    {
        return User::query()->create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
            'active' => 1
        ]);
    }
}



