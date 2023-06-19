<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraphs(3, true),
            'subject' => fake()->words(1, true),
            'audience' => fake()->words(1, true),
            'author' => fake()->words(2, true),
            'ISBN' => fake()->unique()->numberBetween($min = 1, $max = 999),
            'comment' => json_encode([
                fake()->word() => fake()->words(3, true),
                fake()->word() => fake()->words(3, true),
                fake()->word() => fake()->words(3, true),
            ])
        ];
    }
}
