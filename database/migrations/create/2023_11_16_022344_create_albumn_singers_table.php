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
        Schema::create('albumn_singers', function (Blueprint $table) {
            $table->bigInteger('albumn_id')->unsigned();
            $table->bigInteger('singer_id')->unsigned();
            $table->foreign('albumn_id')->references('albumn_id')->on('albumns')->onDelete('cascade');
            $table->foreign('singer_id')->references('singer_id')->on('singers')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albumn_singers');
    }
};
