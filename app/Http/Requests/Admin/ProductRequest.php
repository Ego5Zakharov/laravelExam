<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:5|max:60',
            'description' => 'required|string|min:5|max:400',
            'price' => 'required|numeric|min:50|max:10000000',
            'quantity' => 'sometimes|numeric|min:1|max:10000',
            'images' => 'required|array',
            'published' => 'nullable|boolean|in:0,1',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp,gif|max:2048'
        ];
    }
}
