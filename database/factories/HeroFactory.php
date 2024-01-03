<?php

namespace Database\Factories;

use App\Models\univers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hero>
 */
class HeroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'image' => 'hero.jpg',
            'description' => fake()->text(),
            'univers_id' => univers::inRandomOrder()->first()->id, // Sélectionne un ID d'univers aléatoire
            'gender' => $this->faker->word(),
            'species' => $this->faker->word(),
        ];
    }
}
