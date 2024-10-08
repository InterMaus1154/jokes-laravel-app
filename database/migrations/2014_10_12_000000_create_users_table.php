<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\Enums\UserRole;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id')->unique();
            $table->string('username', 150)->unique();
            $table->string('email', 150)->unique();
            $table->date('date_of_birth');
            $table->string('password');
            $table->boolean('is_verified')->default(false);
            $table->enum('role', array_map(fn($role) => $role->value, UserRole::cases()))->default(UserRole::USER->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
