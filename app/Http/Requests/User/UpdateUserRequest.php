<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    public function authorize()
    {
        return false;
    }


    public function rules(): array
    {
        $unique = Rule::unique('users')->ignore($this->route('user'));

        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:50', 'email', $unique],
            'password' => ['nullable', 'string', 'max:50'],
        ];
    }
}
