<?php

namespace App\Actions\Users\Account;

use App\Actions\Users\CreateUserData;
use App\Models\User;

class UpdateUserAction
{
    public function run(UpdateUserData $data, $user)
    {
        return $user::query()->update([
            'name' => $data->name,
            'avatar' => $data->avatar,
        ]);

    }
}



