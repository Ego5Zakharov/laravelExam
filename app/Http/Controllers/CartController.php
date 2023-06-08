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
        if (Auth::check()) {
            $products = Auth::user()->cart->products;
            $cartItemCount = $products->count();
        }

        return view('cart.index', compact(['products', 'cartItemCount']));
    }

    public function add($id, $quantity = 1)
    {
        $product = Product::query()->findOrFail($id);

        if (Auth::check()) {
            $cart = Auth::user()->cart;
            $existingProduct = $cart->products->firstWhere('id', $product->id);

            if ($existingProduct) {
                $newQuantity = $existingProduct->pivot->quantity + $quantity;
                $cart->products()->updateExistingPivot($product->id, ['quantity' => $newQuantity]);
            } else {
                $cart->products()->attach($product->id, ['quantity' => 1]);
            }
        }

        flash('Товар успешно добавлен в корзину!', 'success');
        return redirect()->route('cart.index');
    }

    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $cart = Auth::user()->cart;

        $action = $request->input('action');
        $changeQuantity = $request->input('change_quantity');

        $cartProduct = $cart->products()->firstWhere('product_id', $product->id);

        if ($action === 'decrease') {
            if ($changeQuantity >= 1) {
                $cart->products()->updateExistingPivot($product->id, ['quantity' => $cartProduct->pivot->quantity - $changeQuantity]);
                if ($cartProduct->pivot->quantity <= 0) {
                    dd('asddasd');
                    exit; // или die;
                }
                flash('Обновлено!', 'primary');
            }
        } elseif ($action == 'increase') {
            if ($changeQuantity < 99) {
                $cartProduct->pivot->update(['quantity' => $cartProduct->pivot->quantity + $changeQuantity]);
                flash('Обновлено!', 'primary');
            }
        }

        return redirect()->route('cart.index');
    }


}
