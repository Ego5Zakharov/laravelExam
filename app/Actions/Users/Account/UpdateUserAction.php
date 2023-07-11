<?php

namespace App\Actions\Users\Account;

use App\Models\User;

class UpdateUserAction
{
    public function run(UpdateUserData $data, $userId)
    {
        $user = User::find($userId)->first();

        if ($user) {
            $user->name = $data->name ?: $user->name;
            $user->avatar = $data->avatar ?: $user->avatar;
            $user->phone = $data->phone ?: $user->phone;

            $user->save();

            return $user;
        }
        return false;
    }
}
