<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Joke>
 */
class JokeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jokeSlug = preg_replace('/[^a-zA-Z\s]/', '', $this->faker->text(100));
        $jokeSlug = strtolower(str_replace(' ', '-', $jokeSlug));

        return [
            'user_id' => $this->faker->randomElement(User::pluck('user_id')),
            'joke_slug' => $jokeSlug,
            'joke_question' => $this->faker->realTextBetween(50, 100),
            'joke_answer' => $this->faker->realTextBetween(100, 200),
            'is_adult' => $this->faker->boolean()
        ];
    }
}
