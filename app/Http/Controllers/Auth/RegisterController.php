<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\AuthenticateUserAction;
use App\Actions\Users\CreateUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
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

        $user = (new CreateUserAction)->run($validated);

        if ((new AuthenticateUserAction)->withSession($user)) {
            return redirect()->route('home');
        }
        return redirect()->back();
    }
}
