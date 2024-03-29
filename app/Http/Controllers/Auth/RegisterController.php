<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\AuthenticateUserAction;
use App\Actions\Users\CreateUserAction;
use App\Actions\Users\CreateUserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();

        $userData = new CreateUserData(
            name: $validated['name'],
            email: $validated['email'],
            password: $validated['password']
        );

        $user = (new CreateUserAction)->run($userData);

        if ((new AuthenticateUserAction)->withSession($user)) {

            Cart::syncCartWithDatabaseAndClearSession($request);

            return redirect()->route('home');
        }
        return redirect()->back();
    }


}
