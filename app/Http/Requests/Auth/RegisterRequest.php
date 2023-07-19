<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:5|max:50',
            'email' => 'required|string|min:10|max:100|email|unique:users',
            'password' => 'required|string|min:8|max:200|confirmed',
        ];
    }
}
