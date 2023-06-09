<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $products = null;
        $cartItemCount = 0;

        if (Auth::check()) {
            $user = Auth::user();
            $cart = $user->cart;


            if ($cart) {
                $products = $cart->products;
                $cartItemCount = $products->count();
            }
        }
        return view('cart.index', compact('products', 'cartItemCount'));

    }

    public function add($id, $quantity = 1)
    {
        $product = Product::findOrFail($id);

        if (Auth::check()) {
            $user = Auth::user();
            $cart = $user->cart;

            if (!$cart) {
                $cart = $user->cart()->create();
            }

            $existingProduct = $cart->products()->find($product->id);

            if ($existingProduct) {
                $newQuantity = $existingProduct->pivot->quantity + $quantity;
                $cart->products()->updateExistingPivot($product->id, ['quantity' => $newQuantity]);
            } else {
                $cart->products()->attach($product->id, ['quantity' => 1]);
            }
        }

        flash('Товар успешно добавлен в корзину!', 'success');
//        return redirect()->route('cart.index');
        return redirect()->back();
    }

    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $cart = Auth::user()->cart;

        $action = $request->input('action');
        $changeQuantity = $request->input('change_quantity');

        $cartProduct = $cart->products()->find($product->id);

        if ($action === 'decrease') {
            if ($changeQuantity >= 1) {
                $newQuantity = $cartProduct->pivot->quantity - $changeQuantity;
                if ($newQuantity > 0) {
                    $cart->products()->updateExistingPivot($product->id, ['quantity' => $newQuantity]);
                } else {
                    $cart->products()->detach($product->id);
                    flash('Предмет успешно удален из корзины!', 'primary');
                }
                flash('Обновлено!', 'primary');
            }
        } elseif ($action == 'increase') {
            if ($changeQuantity < 99) {
                $newQuantity = $cartProduct->pivot->quantity + $changeQuantity;
                $cartProduct->pivot->update(['quantity' => $newQuantity]);
                flash('Обновлено!', 'primary');
            }
        }

        return redirect()->route('cart.index');
    }
}
