<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class EquipmentFactory
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(maxNbChars:20),
            'description' => fake()->text(maxNbChars:100),
            'quantity' => fake()->numberBetween($min=1, $max=10),
        ];
    }
}
