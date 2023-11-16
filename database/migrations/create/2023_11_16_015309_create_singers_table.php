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
        Schema::create('singers', function (Blueprint $table) {
            $table->id('singer_id');
            $table->string('singer_name');
            $table->string('stage_name')->nullable();
            $table->string('country')->nullable();
            $table->date('dob');
            $table->text('cover_photo')->nullable();
            $table->text('short_description')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('singers');
    }
};
