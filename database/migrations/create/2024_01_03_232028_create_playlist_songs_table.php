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
        Schema::create('playlist_songs', function (Blueprint $table) {
            $table->bigInteger('playlist_id')->unsigned();
            $table->bigInteger('song_id')->unsigned();
            $table->foreign('playlist_id')->references('playlist_id')->on('playlists')->onDelete('cascade');
            $table->foreign('song_id')->references('song_id')->on('songs')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlist_songs');
    }
};
