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
            flash('Вы успешно аунтефицировались!', 'success');

            $cartData = $request->input('cart');
            $cart = json_decode($cartData, true);

            if (!empty($cart)) {
                $user = Auth::user();

                if (!$user->cart) {
                    $cart = new Cart();
                    $user->cart()->save($cart);
                }

                foreach ($cart as $productId => $cartItem) {
                    $product = Product::query()->find($productId);

                    if ($product) {
                        if ($user->cart->products()->find($product->id)) {
                            $user->cart->products()->updateExistingPivot($product->id,
                                ['quantity' => $cartItem['quantity']]);
                        }
                        else{
                            $user->cart->products()->attach($product);
                        }
                    }
                }
            }

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
