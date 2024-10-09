<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateUserPasswordRequest extends FormRequest
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
            'old_password' => 'required|string',
            'new_password' => 'required|string|confirmed|min:8'
        ];
    }

    public function messages()
    {
        return [
            'new_password.confirmed' => 'The passwords do not match!'
        ];
    }

    /**
     *
     * @param $validator
     * @return void
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            /**
             * Check if the entered new password is the same as the previous one
             */
            if (Hash::check($this->new_password, auth()->user()->password)) {
                $validator->errors()->add('new_password', 'The new password cannot be the same as the old one!');
            }
        });
    }
}
