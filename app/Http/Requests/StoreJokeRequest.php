<?php

namespace App\Http\Requests;

use App\Models\Joke;
use Illuminate\Foundation\Http\FormRequest;

class StoreJokeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('create', Joke::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'joke_question' => 'required|string|max:500',
            'joke_answer' => 'required|string|max:500',
            'joke_tags' => 'nullable|array'
        ];
    }
}
