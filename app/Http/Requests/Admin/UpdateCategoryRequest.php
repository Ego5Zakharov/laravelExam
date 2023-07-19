<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'up_name' => 'sometimes|string|min:5|max:50',
            'up_image' => 'sometimes|image|mimes:jpeg,png,webp,jpg,gif|max:2048',
        ];
    }
}
