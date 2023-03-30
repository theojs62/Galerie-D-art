<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Lance la migration.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->id('id');
            $table->string('name_artwork')->nullable(false);
            $table->text('description_artwork')->nullable(true);
            $table->date('date_artwork')->nullable(true);
            $table->text('link_artwork')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Annule la migration.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('artworks');
    }
};
