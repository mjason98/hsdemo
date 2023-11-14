<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recepies>
 */
class RecepiesFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'instructions' => fake()->paragraph(),
            'users_id' => function () {
                return User::all()->random(1)->first()->id;
            },
        ];
    }
}
