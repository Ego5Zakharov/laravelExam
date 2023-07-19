<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|string|min:5|max:50',
            'image' => 'image|mimes:jpeg,png,jpg,webp,gif|max:2048'
        ];
    }
}
