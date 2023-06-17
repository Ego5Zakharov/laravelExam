<?php

namespace App\Actions\Users\Account;

use App\Actions\Users\CreateUserData;
use App\Models\User;

class UpdateUserAction
{
    public function run(UpdateUserData $data, $userId)
    {
        $user = User::query()->find($userId);

        if ($user) {
            $user->toQuery()->update([
                'name' => $data->name,
                'avatar' => $data->avatar,
            ]);
            return $user;

        }
        return false;
    }
}



