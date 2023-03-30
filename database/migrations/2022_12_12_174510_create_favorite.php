<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Lance les migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('favorite', function (Blueprint $table) {
            $table->unsignedBigInteger('artwork_id');
            $table->unsignedBigInteger('visitor_id');
            $table->foreign('artwork_id')->references('id')->on('artworks')->onDelete('cascade');
            $table->foreign('visitor_id')->references('id')->on('visitors')->onDelete('cascade');
        });
    }

    /**
     * Annule les migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite');
    }
};
