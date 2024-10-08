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
        Schema::create('joke_comments', function (Blueprint $table) {
            $table->increments('joke_comment_id')->unique();
            $table->unsignedInteger('joke_id');
            $table->foreign('joke_id')->references('joke_id')->on('jokes')->cascadeOnDelete();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->cascadeOnDelete();
            $table->text('comment_content');
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joke_comments');
    }
};
