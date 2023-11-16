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
        Schema::create('type_songs', function (Blueprint $table) {
            $table->bigInteger('type_id')->unsigned();
            $table->bigInteger('song_id')->unsigned();
            $table->foreign('type_id')->references('type_id')->on('types_of_song')->onDelete('cascade');
            $table->foreign('song_id')->references('song_id')->on('songs')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_songs');
    }
};
