<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5|max:50',
            'email' => 'required|string|min:10|max:100|email|unique:users',
            'password' => 'required|string|min:8|max:200|confirmed',
        ]);

        $user = User::query()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'active' => 1
        ]);

        $user->save();
        if (Auth::attempt($validated)) {
            return redirect()->route('home')->with(['success' => 'Вы успешно зарегистрировались']);
        }

        return redirect()->back();
    }
}
