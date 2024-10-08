<?php

namespace Database\Seeders;

use App\Models\JokeTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JokeTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JokeTag::factory(400)->create();
    }
}
