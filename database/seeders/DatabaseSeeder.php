<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory(5)->create();
        \App\Models\User::factory()->create([
            'name' => 'MJTest',
            'email' => 'mjt@e.xa',
        ]);

        \App\Models\Ingredients::factory(4)->create();
        $recipes = \App\Models\Recipes::factory(50)->create();

        foreach($recipes as $recipe)
        {
            $recipe->ingredients()->attach([rand(1,4), rand(1,4), rand(1,4)]);
        }
    }
}
