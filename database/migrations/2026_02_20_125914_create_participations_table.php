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
        Schema::create('participations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('film_id')
                  ->constrained('films')
                  ->onDelete('cascade');

            $table->foreignId('acteur_id')
                  ->constrained('acteurs')
                  ->onDelete('cascade');

            $table->string('role');

            $table->unique(['film_id', 'acteur_id']);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participations');
    }
};
