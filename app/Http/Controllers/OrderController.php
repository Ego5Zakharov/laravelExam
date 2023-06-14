<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\s;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = Auth::user()->cart;
        if (!empty($cart->products)) {
            $products = $cart->products;
            $cartItemCount = Cart::getCartItemCount();
            $cartPrice = Cart::getCartTotalPrice();

            return view('order.checkout', compact(['products','cartItemCount','cartPrice']));
        }

        flash('Ошибка заказа!', 'warning');
        return redirect()->back();
    }
}
