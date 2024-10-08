<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'user_id' => 1,
            'tag_name' => 'Dark',
            'tag_color' => '#f59e0b',
        ]);

        Tag::create([
            'user_id' => 1,
            'tag_name' => 'Dad',
            'tag_color' => '#2563eb'
        ]);

        Tag::create([
            'user_id' => 1,
            'tag_name' => 'Political',
            'tag_color' => '#eab308'
        ]);

        Tag::create([
            'user_id' => 1,
            'tag_name' => 'Animal',
            'tag_color' => '#16a34a'
        ]);

        Tag::create([
            'user_id' => 1,
            'tag_name' => 'Sport',
            'tag_color' => '#083344'
        ]);

        Tag::create([
            'user_id' => 1,
            'tag_name' => 'School',
            'tag_color' => '#8b5cf6'
        ]);
    }
}
