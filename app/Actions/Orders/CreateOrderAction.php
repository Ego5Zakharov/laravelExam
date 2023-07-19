<?php

namespace App\Actions\Orders;

use App\Actions\OrderDetails\CreateOrderDetailsAction;
use App\Actions\OrderDetails\CreateOrderDetailsData;
use App\Models\Order;
use App\Support\Values\Number;
use Illuminate\Support\Facades\Auth;

class CreateOrderAction
{
    /**
     * @return Order|null
     */
    public function run()
    {
        if (Auth::check() && !empty(Auth::user()->cart)) {
            $user = Auth::user();
            $order = new Order();
            $order->user_id = $user->id;
            $order->save();

            $cartProducts = $user->cart->products;

            foreach ($cartProducts as $product) {
                $quantity = $product->pivot->quantity ?? 1;
                $order->products()->attach($product->id, ['quantity' => $quantity]);
            }

            return $order;
        }
        return null;
    }
}
