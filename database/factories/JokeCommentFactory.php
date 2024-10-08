<?php

namespace Database\Factories;

use App\Models\Joke;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JokeComment>
 */
class JokeCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'joke_id' => fake()->randomElement(Joke::pluck('joke_id')),
            'user_id' => fake()->randomElement(User::pluck('user_id')),
            'comment_content' => fake()->realText(100)
        ];
    }
}
