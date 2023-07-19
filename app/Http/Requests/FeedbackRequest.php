<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => 'required|string|min:10|max:1000',
            'rating' => 'required|integer|between:1,5',
            'visible' => 'nullable|in:0,1',
        ];
    }
}
