<?php

namespace App\Actions\Orders;

use App\Models\Order;

class CreateOrderAction
{
    public function run(CreateOrderData $data): Order
    {
        return Order::query()->create([
            'amount' => $data->amount,
            'discount_amount' => 0,
            'user_amount' => $data->amount
        ]);
    }
}
