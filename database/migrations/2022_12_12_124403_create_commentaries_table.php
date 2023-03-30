<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('commentaries', function (Blueprint $table) {
            $table->id('id_commentary');
            $table->string('title_commentary')->nullable(false);
            $table->string('text_commentary')->nullable(false);
            $table->unsignedBigInteger('visitor_id');
            $table->foreign('visitor_id')->references('id')->on('visitors')->onDelete('cascade');
            $table->unsignedBigInteger('artwork_id');
            $table->foreign('artwork_id')->references('id')->on('artworks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaries');
    }
};
