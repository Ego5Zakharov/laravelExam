<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $orders = $user->orders;
            $orders = $orders->filter(function ($order) use ($user) {
                return $order->user_id === $user->id;
            });
            return view('user.account.orders.index', compact('orders'));
        }
        flash('Ошибка', 'error');
        return redirect()->back();
    }

    public function show(Order $order)
    {
        return view('user.account.orders.show', compact('order'));
    }

}
