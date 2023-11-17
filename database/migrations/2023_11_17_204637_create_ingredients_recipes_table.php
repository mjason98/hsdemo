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
        Schema::create('ingredients_recipes', function (Blueprint $table) {
            $table->foreignId('ingredients_id');
            $table->foreignId('recipes_id');

            $table->unique(['ingredients_id', 'recipes_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients_recipes');
    }
};
