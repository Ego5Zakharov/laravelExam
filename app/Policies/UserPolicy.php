<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function view(User $user)
    {
        return $user->id === 8;
    }

    public function create(User $user)
    {
        return $user->id === 9;
    }


    public function update(User $user, User $model)
    {
        //
    }
}
