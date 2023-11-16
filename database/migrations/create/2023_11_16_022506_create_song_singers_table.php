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
        Schema::create('song_singers', function (Blueprint $table) {
            $table->bigInteger('song_id')->unsigned();
            $table->bigInteger('singer_id')->unsigned();
            $table->foreign('song_id')->references('song_id')->on('songs')->onDelete('cascade');
            $table->foreign('singer_id')->references('singer_id')->on('singers')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('song_singers');
    }
};
