<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate(
            ['email' => 'required|email',
                'password' => 'required',]
        );

        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with(['success' => 'Вы успешно авторизировались']);
        }

        return back()->withErrors(['email' => 'Неправильный логин или пароль']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
