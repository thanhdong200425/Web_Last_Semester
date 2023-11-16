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
        Schema::create('users', function(Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->text('cover_photo')->nullable();
            $table->integer('phone_number')->nullable()->unsigned();
            $table->tinyInteger('Gender')->nullable()->comment('0: MEN; 1:WOMEN');
            $table->date('dob')->nullable();
            $table->string('country')->nullable();
            $table->tinyInteger('Role')->comment('0: ADMIN; 1:USER');
            $table->timestamps();
            $table->text('refresh_token')->nullable();
            $table->engine = 'InnoDB';
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
