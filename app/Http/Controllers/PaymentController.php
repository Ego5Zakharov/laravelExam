<?php

namespace App\Http\Controllers;

use App\Actions\Payment\CreateTokenAction;
use App\Actions\Payment\CreateTokenData;
use App\Http\Requests\Payment\PaymentRequest;
use App\Support\Values\CurrencyConverter;
use App\Support\Values\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Token;

class PaymentController extends Controller
{
    protected CurrencyConverter $currencyConverter;

    public function __construct(CurrencyConverter $currencyConverter)
    {
        $this->currencyConverter = $currencyConverter;
    }

    public function checkout()
    {
        return view('payment.checkout');
    }

    // 4242424242424242
    public function processPayment(PaymentRequest $request)
    {
        $validated = $request->validated();

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $token = new CreateTokenData(
            card_number: $validated['card_number'],
            expirationMonth: (int)substr($validated['expiration_date'], 0, 2),
            expirationYear: (int)substr($validated['expiration_date'], 3, 2),
            cvc: $validated['cvc']
        );

        $token = (new CreateTokenAction)->run($token);

        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create card token.',
            ], 500);
        }

        $charge = Charge::create([
            'amount' => $validated['amount'] * 100,
            'currency' => 'usd',
            'source' => $token->id,
        ]);

        if ($charge->status !== 'succeeded') {
            flash('Ошибка платежа!');
            return redirect()->back();
        }

        $this->accountRefill($charge['amount']);

        return redirect()->route('home');
    }

    public function accountRefill($amount)
    {
        if (!Auth::check()) {
            redirect()->back();
        }

        $user = Auth::user();
        $exchangeRate = $this->currencyConverter->getExchangeRate('USD', 'KZT');
        $amountKZT = ($amount * $exchangeRate)/100;
        $user->balance += $amountKZT;

        $user->save();
        flash('Баланс пополнен на ' . (int)$amountKZT . ' тенге!', 'success');
    }
}
