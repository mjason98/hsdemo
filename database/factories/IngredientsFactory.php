<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredients>
 */
class IngredientsFactory extends Factory
{
    public $someIngredients = ['tomatoes',
        'carrot',
        'onions',
        'potatoes'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement($this->someIngredients),
            'users_id' => function () {
                return User::all()->random(1)->first()->id;
            },
        ];
    }
}
