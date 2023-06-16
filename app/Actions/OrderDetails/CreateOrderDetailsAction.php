<?php

namespace App\Actions\OrderDetails;

use App\Models\OrderDetail;

class CreateOrderDetailsAction
{
    public function run(CreateOrderDetailsData $data)
    {
        return OrderDetail::query()->create([
            'order_id' => $data->orderId,
            'amount' => $data->amount,
            'discount_amount' => $data->discount_amount,
            'total_amount' => $data->amount->sub($data->discount_amount)]);
    }
}
