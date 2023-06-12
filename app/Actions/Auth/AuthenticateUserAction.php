<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthenticateUserAction
{
    public function withAttributes(array $attributes)
    {
        if (Auth::attempt($attributes)) {
            flash('Вы успешно зарегистрировались!', 'success');
            return true;
        }
        return false;
    }

    public function withSession(User $user)
    {
        Auth::login($user);
        if (Auth::hasUser()) {
            flash('Вы успешно зарегистрировались!', 'success');
            return true;
        }
        return false;
    }

    public function withToken(User $user, string $name)
    {
        $token = $user->createToken($name);

        return $token->plainTextToken;
    }

}
