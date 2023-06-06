<?php

namespace App\Http\Requests\UserAccount;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserAccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|min:5|max:50',
            'image' => 'sometimes|image|mimes:jpeg,jpg,png,gif|max:2048'
        ];
    }
}
