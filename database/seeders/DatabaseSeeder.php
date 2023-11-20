<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\AdminEmails::factory()->create([
            'name' => 'Big Boss',
            'email' => 'admin@example.com',
        ]);

        \App\Models\User::factory(5)->create();
        \App\Models\User::factory()->create([
            'name' => 'MJTest',
            'email' => 'mjt@e.xa',
        ]);

        \App\Models\Ingredients::factory(4)->create();
        \App\Models\Tags::factory(10)->create();

        $recipes = \App\Models\Recipes::factory(50)->create();

        foreach ($recipes as $recipe) {
            $uniqueIngredientIds = Collection::times(rand(2, 5), function () {
                return rand(1, 4);
            })->unique()->values()->all();

            $recipe->ingredients()->attach($uniqueIngredientIds);

            $uniqueTagsIds = Collection::times(rand(3, 8), function () {
                return rand(1, 10);
            })->unique()->values()->all();

            $recipe->tags()->attach($uniqueTagsIds);
        }
    }
}
