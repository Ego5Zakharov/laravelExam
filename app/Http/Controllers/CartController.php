<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addSession($id, $quantity = 1)
    {
        $product = Product::find($id);

        $cartItemCount = session('cart.cartItemCount', 0);

        if ($product) {
            $cart = session()->get('cart', []);

            $cartItem = [
                'id' => $product->id,
                'title' => $product->title,
                'description' => $product->description,
                'price' => $product->price,
                'image' => $product->images()->exists() ? $product->images()->first()->imagePath : '',
                'quantity' => $quantity,
            ];

            if (isset($cart[$id])) {
                $cart[$id]['quantity'] += $quantity;

            } else {
                $cart[$id] = $cartItem;
                $cartItemCount++;
                $cart['cartItemCount'] = $cartItemCount;
            }
            session()->put('cart', $cart);
            flash('Товар успешно добавлен в корзину!', 'success');
        }

        return redirect()->back();
    }

    public function updateSessionProduct($id, Request $request)
    {
        $action = $request->input('action');
        $quantityRequest = $request->input('quantity');
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            if ($action === 'increase_quantity') {
                $cart[$id]['quantity'] += $quantityRequest;
            } else if ($action === 'decrease_quantity') {
                $cart[$id]['quantity'] -= $quantityRequest;
            }
            if ($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
                $cartItemCount = $cart['cartItemCount'];
                $cartItemCount--;
                $cart['cartItemCount'] = $cartItemCount;
            }

            session()->put('cart', $cart);

            if ($cart['cartItemCount'] === 0) {
                $this->deleteCartSession();
            }
            flash('Данные успешно изменены!', 'primary');
        }

        return redirect()->back();
    }

    public function deleteCartSessionProduct($id)
    {
        if (session()->has('cart')) {
            $cart = session('cart', []);
            if (isset($cart[$id])) {
                unset($cart[$id]);

                $cartItemCount = $cart['cartItemCount'];
                $cartItemCount--;

                $cart['cartItemCount'] = $cartItemCount;
                session()->put('cart', $cart);

                if ($cart['cartItemCount'] === 0) {
                    $this->deleteCartSession();
                }
                flash('Товар успешно удален!', 'primary');

            } else {
                flash('Товар уже удален!', 'warning');
            }
        }
        return back();
    }

    public function deleteCartSession()
    {
        if (session()->has('cart')) {
            session()->forget('cart');
            flash('Товары удалены!', 'primary');
        } else {
            flash('Нечего удалять!', 'danger');
        }
        return back();
    }

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

            return view('cart.index', compact('products', 'cartItemCount'));
        } else {
            $cart = session()->get('cart', []);
            $cartPrice = 0;
            $products = [];

            foreach ($cart as $productId => $cartItem) {
                $product = Product::find($productId);

                if ($product) {
                    $product = [
                        'id' => $product->id,
                        'title' => $product->title,
                        'description' => $product->description,
                        'price' => $product->price,
                        'image' => $product->images()->exists() ? $product->images()->first()->imagePath : '',
                        'quantity' => $cart[$productId]['quantity'],
                    ];

                    $products[] = $product;
                }
            }

            $cartItemCount = count($products);

            return view('cart.index', compact('products', 'cartItemCount',));
        }
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
        return redirect()->back();
    }

    public function delete($productId)
    {
        if (Auth::check()) {
            if ($cart = Auth::user()->cart) {
                $product = $cart->products()->find($productId);
                if ($product) {
                    $cart->products()->detach($product);
                    flash('Продукт успешно удален из корзины!', 'primary');
                }
            }
        }
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
