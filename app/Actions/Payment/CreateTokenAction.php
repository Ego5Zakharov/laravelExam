<?php

namespace App\Actions\Payment;

use Stripe\Stripe;
use Stripe\Token;

class CreateTokenAction
{
    public function run(CreateTokenData $token)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        return Token::create([
            'card' => [
                'number' => $token->card_number,
                'exp_month' => $token->expirationMonth,
                'exp_year' => $token->expirationYear,
                'cvc' => $token->cvc,
            ],
        ]);
    }
}
