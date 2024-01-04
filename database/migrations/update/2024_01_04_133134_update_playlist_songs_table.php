<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('playlist_songs', function (Blueprint $table) {
            $table->primary(['playlist_id', 'song_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('playlist_songs', function (Blueprint $table) {
            $table->dropPrimary(['playlist_id', 'song_id']);
        });
    }
};
