<?php

namespace App\Actions\Orders;

class CreateOrderData
{
    public function __construct(
        public readonly string $amount,
    )
    {

    }
}
