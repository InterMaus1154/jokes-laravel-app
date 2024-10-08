<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|max:150|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|string|max:150|unique:users,email',
            'date_of_birth' => 'required|date|before:'.now()->subYears(12)->format('Y-m-d')
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'Required \':attribute\' field is missing!',
            'username.max' => 'Maximum allowed length for username is 150 characters',
            'email.max' => 'Maximum allowed length for email is 150 characters',
            'username.unique' => 'This username is already taken!',
            'email.unique' => 'This email is already registered with us!',
            'date_of_birth.before' => 'You must be at least 12 years old to register!',
            'password.confirmed' => 'Passwords do not match!'
        ];
    }
}
