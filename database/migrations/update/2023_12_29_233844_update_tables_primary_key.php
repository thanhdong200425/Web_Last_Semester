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
        Schema::table('albumn_singers', function (Blueprint $table) {
            $table->primary(['albumn_id', 'singer_id']);
        });

        Schema::table('albumn_songs', function (Blueprint $table) {
            $table->primary(['albumn_id', 'song_id']);
        });

        Schema::table('song_singers', function (Blueprint $table) {
            $table->primary(['song_id', 'singer_id']);
        });

        Schema::table('type_songs', function (Blueprint $table) {
            $table->primary(['type_id', 'song_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('albumn_singers', function (Blueprint $table) {
            $table->dropColumn(['albumn_id', 'singer_id']);
        });

        Schema::table('albumn_songs', function (Blueprint $table) {
            $table->dropColumn(['albumn_id', 'song_id']);
        });

        Schema::table('song_singers', function (Blueprint $table) {
            $table->dropColumn(['song_id', 'singer_id']);
        });

        Schema::table('type_songs', function (Blueprint $table) {
            $table->dropColumn(['type_id', 'song_id']);
        });
    }
};
