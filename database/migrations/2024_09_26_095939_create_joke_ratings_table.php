<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('joke_ratings', function (Blueprint $table) {
            $table->increments('joke_rating_id')->unique();
            $table->unsignedInteger('joke_id');
            $table->foreign('joke_id')->references('joke_id')->on('jokes')->cascadeOnDelete();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->cascadeOnDelete();
            $table->enum('rating_value', [1, 2, 3, 4, 5])->default(5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joke_ratings');
    }
};
