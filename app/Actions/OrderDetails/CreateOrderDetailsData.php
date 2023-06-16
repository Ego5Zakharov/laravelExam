<?php

namespace App\Actions\OrderDetails;

use App\Support\Values\Number;

class CreateOrderDetailsData
{
    public function __construct(
        readonly Number $amount,
        readonly Number $discount_amount,
        readonly int $orderId,
    )
    {

    }
}
