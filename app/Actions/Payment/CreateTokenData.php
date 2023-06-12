<?php

namespace App\Actions\Payment;

class CreateTokenData
{
    public function __construct(
        public readonly int $card_number,
        public readonly int $expirationMonth,
        public readonly int $expirationYear,
        public readonly int $cvc,
    )
    {
    }
}
