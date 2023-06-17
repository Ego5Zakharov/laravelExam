<?php

namespace App\Http\Controllers;

use App\Actions\Delivery\CreateDeliveryAction;
use App\Actions\Delivery\CreateDeliveryData;
use App\Actions\OrderDetails\CreateOrderDetailsAction;
use App\Actions\OrderDetails\CreateOrderDetailsData;
use App\Actions\Orders\CreateOrderAction;
use App\Http\Requests\DeliveryRequest;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Support\Values\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    public function create()
    {
        $hasOrder = $this->hasOrder();
        if ($hasOrder) {
            return redirect()->route('order.checkout', ['order_id' => $hasOrder->id]);
        }
        return view('delivery.create');
    }

    public function store(DeliveryRequest $request)
    {
        $hasOrder = $this->hasOrder();
        if ($hasOrder) {
            return redirect()->route('order.checkout', ['order_id' => $hasOrder->id]);
        }

        $validated = $request->validated();

        $delivery = $this->createDelivery($validated);
        $order = $this->createOrder();
        $orderDetails = $this->createOrderDetails($order->id);

        $order->details()->save($orderDetails);
        $order->delivery()->save($delivery);

//        if (Order::getOrderTotalSum($order->id) <= 0 || Order::getOrderProductCount($order->id) <= 0) {
//            $this->deleteOrder($order);
//
//            flash('Ошибка Заказа!');
//            return redirect()->back();
//        }

        flash('Оплатите заказ для продолжения работы!', 'primary');

        return redirect()->route('order.checkout', ['order_id' => $order->id]);
    }

    protected function starOrderSession(Delivery $delivery, $hours = 1)
    {
        Delivery::setSpecialCode($delivery->id);
        $expirationTime = now()->addHours($hours);

        session()->put('delivery', $delivery);
        session('delivery_expiration', $expirationTime);
    }

    protected function createOrder()
    {
        return (new CreateOrderAction)->run();
    }

    protected function deleteOrder(Order $order)
    {
        $order->details()->delete();
        $order->products()->detach();
        $order->delivery()->delete();
        $order->delete();
    }

    protected function createDelivery(array $data)
    {
        $deliveryData = new CreateDeliveryData(
            first_name: $data['first_name'],
            last_name: $data['last_name'],
            phone: $data['phone'],
            address: $data['address'],
            city: $data['city'],
            notes: $data['notes'] ?? null
        );

        return (new CreateDeliveryAction)->run($deliveryData);
    }

    protected function createOrderDetails(int $orderId)
    {
        $orderDetailsData = new CreateOrderDetailsData(
            amount: new Number(Cart::getCartTotalPrice()),
            discount_amount: new Number(0),
            orderId: $orderId);

        return (new CreateOrderDetailsAction)->run($orderDetailsData);
    }
    protected function hasOrder()
    {
        $hasOrder = Auth::user()->orders->where('is_paid', false)->first();
        if ($hasOrder) {
            flash('У вас уже есть сохраненный заказ! Удалите его или продолжите здесь', 'primary');
            return $hasOrder;
        }
        return false;
    }
}
