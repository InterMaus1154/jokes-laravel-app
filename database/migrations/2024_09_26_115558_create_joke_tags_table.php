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
        Schema::create('joke_tags', function (Blueprint $table) {
            $table->increments('joke_tag_id')->unique();
            $table->unsignedInteger('joke_id');
            $table->foreign('joke_id')->references('joke_id')->on('jokes')->cascadeOnDelete();
            $table->unsignedInteger('tag_id');
            $table->foreign('tag_id')->references('tag_id')->on('tags')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joke_tags');
    }
};
