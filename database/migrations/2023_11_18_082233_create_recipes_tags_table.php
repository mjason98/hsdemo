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
        Schema::create('recipes_tags', function (Blueprint $table) {
            $table->foreignId('recipes_id')
                ->constrained('recipes')
                ->onDelete('cascade');

            $table->foreignId('tags_id')
                ->constrained('tags')
                ->onDelete('cascade');
            
            $table->unique(['recipes_id', 'tags_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes_tags');
    }
};
