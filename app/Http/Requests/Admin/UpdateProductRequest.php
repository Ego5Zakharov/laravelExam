<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|string|min:5|max:60',
            'description' => 'sometimes|string|min:5|max:400',
            'price' => 'sometimes|numeric|min:50|max:10000000',
            'quantity' => 'sometimes|numeric|min:1|max:10000',
            'images' => 'sometimes|array',
            'published' => 'nullable|boolean|in:0,1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
