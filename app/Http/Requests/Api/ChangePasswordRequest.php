<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'new_password' => [
                'required',
                'min:8',
                'max:20',
                'regex:' . config('regex.password')
            ],
            'password_confirmed' => 'required|same:new_password',
        ];
    }

    public function attributes()
    {
        return [
            'new_password' => __('attribute.new_password'),
            'password_confirmed' => __('attribute.password_confirmed'),
        ];
    }

    public function messages()
    {
        return [
            'new_password.regex' => 'Please set your password to be at least 8 digits and use 3 types of numbers, uppercase letters, lowercase letters, and symbols.',
        ];
    }
}
