<?php

namespace Database\Seeders;

use App\Models\JokeComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JokeCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        JokeComment::factory(1000)->create();
    }
}
