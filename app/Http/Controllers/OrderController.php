<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Support\Values\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\s;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $orderId = $request->input('order_id');
        $order = Order::query()->find($orderId);

        if (!empty($order) && $order->user_id == Auth::user()->id) {
            $orderItemCount = Order::getOrderProductCount($order->id);
            $orderPrice = Order::getOrderTotalSum($order->id);
            $orderDetails = $order->details;
            $products = $order->products;
            return view('order.checkout', compact(['orderPrice', 'orderItemCount', 'products', 'orderDetails', 'order']));
        }

        flash('Ошибка заказа!', 'warning');
        return redirect()->back();
    }

    public
    function store($orderId)
    {
        $result = $this->makePayment($orderId);
        if ($result) {
            return redirect()->route('home');
        } else {
            return redirect()->back();
        }
    }

    public function delete($orderId)
    {
        Order::orderDelete($orderId);
        flash('Заказ успешно удален!', 'primary');
        return redirect()->route('home');
    }

    protected function makePayment($orderId)
    {
        $user = Auth::user();
        $order = $user->orders->find($orderId);

        if (!empty($order)) {
            $action = $this->orderProductsQuantityUpdate($order);
            if ($action === false) {
                return false;
            }

            $userMoney = $this->moneyAction($order, $user);

            if ($userMoney >= 0) {
                $user->balance = (int)$userMoney;
                $user->cart->products()->detach();
                $user->cart->total_price = 0;
                $user->save();

                $order->is_paid = true;
                $order->save();

                flash('Заказ успешно оплачен!', 'success');
                return true;
            } else {
                flash('Недостаточно средств для совершения платежа! '
                    . 'Ваш баланс: '
                    . $user->balance . 'тг',
                    'warning');
            }
        } else {
            flash('Заказ не найден!', 'warning');
        }

        return false;
    }

    protected
    function moneyAction(Order $order, User $user)
    {
        $order_price = $order->details->total_amount;
        $user_balance = new Number($user->balance);
        $result = $user_balance->value - $order_price->value;

        return $result;
    }

    protected
    function orderProductsQuantityUpdate(Order $order)
    {
        foreach ($order->products as $product) {
            $newQuantity = $product->quantity - $product->pivot->quantity;
            if ($newQuantity < 0) {
                flash('Ошибка! На складе в текущий момент находится '
                    . $product->quantity . ' товаров типа "' . $product->title . '"', 'danger');
                return false;
            }
            $product->quantity = $newQuantity;
            $product->save();
        }
        return true;
    }


}
