<?php

namespace Database\Factories;

use App\Models\Joke;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JokeTag>
 */
class JokeTagFactory extends Factory
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
            'tag_id' => fake()->randomElement(Tag::pluck('tag_id'))
        ];
    }
}
