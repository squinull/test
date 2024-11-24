<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Release>
 */
class ReleaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'content' => $this->faker->paragraphs(3, true),
            'version' => $this->faker->randomFloat(2, 1, 10),
            'release_date' => $this->faker->date(),
            'media' => $this->faker->optional()->imageUrl(),
            'link' => $this->faker->optional()->url(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
