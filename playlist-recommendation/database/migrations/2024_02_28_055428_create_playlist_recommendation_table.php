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
        Schema::create('musics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::create('model_has_genre', function (Blueprint $table) {
            $table->string('model_type');
            $table->string('model_id');
            $table->unsignedBigInteger('genre_id');
            $table->timestamps();
        });

        Schema::create('user_favourites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('favourite_type');
            $table->string('favourite_id');
            $table->timestamps();
        });

        Schema::create('playlist_musics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('playlist_id');
            $table->unsignedBigInteger('music_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlist_musics');
        Schema::dropIfExists('user_favourites');
        Schema::dropIfExists('model_has_genre');
        Schema::dropIfExists('playlists');
        Schema::dropIfExists('genres');
        Schema::dropIfExists('musics');
    }
};
