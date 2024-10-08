<?php

namespace Database\Seeders;

use App\Helpers\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create admin user
        User::create([
            'username' => 'admin',
            'password' => 'admin',
            'email' => 'admin@admin.net',
            'date_of_birth' => '2005-01-01',
            'is_verified' => true,
            'role' => UserRole::ADMIN->value
        ]);

        User::factory(60)->create();
    }
}
