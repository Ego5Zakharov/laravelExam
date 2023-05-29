<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


// аунтентифицировать юзера
class AuthenticateUserAction
{
    public function withAttributes(array $attributes)
    {
        if (Auth::attempt($attributes)) {
            session()->flash('flash.message', 'Вы успешно зарегистрировались');
            session()->flash('flash.key', 'success');
            return true;
        }
        return false;
    }

    public function withSession(User $user)
    {
        Auth::login($user);
        if (Auth::hasUser()) {
            session()->flash('flash.message', 'Вы успешно зарегистрировались');
            session()->flash('flash.type', 'success');
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
