<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|min:4|max:50',
            'last_name' => 'required|string|min:4|max:50',
            'phone' => 'required|string',
            'address' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'notes' => 'nullable|string'
        ];
    }
}
