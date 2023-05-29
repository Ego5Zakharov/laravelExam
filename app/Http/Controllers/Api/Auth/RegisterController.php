<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Auth\AuthenticateUserAction;
use App\Actions\Users\CreateUserAction;
use App\Actions\Users\CreateUserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserResourse;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = (new CreateUserAction)->run(new CreateUserData(
            name: $validated['name'],
            email: $validated['email'],
            password: $validated['password']
        )
        );

        $token = (new AuthenticateUserAction)->withToken($user, $validated['device']);

        return UserResourse::make($user)->additional(compact('token'));
//        return response()->json([
//            'user' => $user->toArray(),
//            'token' =>$token->plainTextToken,
//        ]);
    }
}
