<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'card_number' => 'required|numeric|digits:16',
            'expiration_date' => 'required|date_format:m/y',
            'cvc' => 'required|numeric|digits_between:3,4',
            'amount' => 'required|numeric|min:0',
        ];
    }
}
