<?php

namespace App\Actions\Delivery;

class CreateDeliveryData
{
    public function __construct(
        public readonly string $first_name,
        public readonly string $last_name,
        public readonly string $phone,
        public readonly string $address,
        public readonly string $city,
        public readonly string $notes,
    )
    {
    }
}
