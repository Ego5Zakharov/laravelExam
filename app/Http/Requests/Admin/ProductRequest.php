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
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validate each image file
        ];
    }
}