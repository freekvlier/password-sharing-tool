<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'password' => 'required|string|min:6',
            'max_views' => 'required|integer|min:1',
            'expiration_time' => [
                'nullable',
                'string',
                function ($attribute, $value, $fail) {
                    // Check if the date matches the desired format
                    $date = date_create_from_format('d-m-Y, H:i', $value);
                    if (!$date || $date->format('d-m-Y, H:i') !== $value) {
                        $fail('The ' . $attribute . ' does not match the format "d-m-Y, H:i".');
                    }
                },
                'after:now',
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 6 characters.',
            'max_views.required' => 'The times viewable field is required.',
            'max_views.integer' => 'The times viewable must be an integer.',
            'max_views.min' => 'The times viewable must be at least 1.',
            'expiration_time.string' => 'The expiration time must be a string.',
            'expiration_time.after' => 'The expiration time must be a date after the current time.',
            'expiration_time.custom' => 'The expiration time does not match the format "d-m-Y, H:i".',
        ];
    }
}
