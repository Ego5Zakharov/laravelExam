<?php

namespace App\Actions\Users;

use App\Models\User;

class CreateUserAction
{
    public function run(CreateUserData $data): User
    {
        return User::query()->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password),
            'active' => 1
        ]);
    }
}



