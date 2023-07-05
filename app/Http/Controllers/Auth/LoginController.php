<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
                flash('Вы успешно аутентифицировались!', 'success');

            Cart::syncCartWithDatabaseAndClearSession($request);

            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Неправильный логин или пароль']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
