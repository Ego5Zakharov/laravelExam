<?php

namespace App\Models;

use App\Actions\OrderDetails\CreateOrderDetailsData;
use App\Support\Values\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'is_paid'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'order_products',
            'order_id',
            'product_id')->withPivot(['quantity', 'price']);
    }

    public function details()
    {
        return $this->hasOne(OrderDetail::class);
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }

    public static function getOrderTotalSum($orderId)
    {
        return (int)Auth::user()
            ->orders
            ->find($orderId)
            ->products()
            ->sum(DB::raw('order_products.quantity * products.price')) ?? 0;
    }

    public static function getOrderProductCount($orderId)
    {
        return Auth::user()->orders->find($orderId)->products()->count() ?? 0;
    }

    public static function orderDelete($orderId)
    {
        $order = Order::query()->find($orderId);
        if ($order) {
            $order->details()->delete();
            $order->products()->detach();
            $order->delivery()->delete();
            $order->delete();
        }
    }
}
