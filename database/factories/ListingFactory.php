<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 10),
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(),
            'image' => fake()->imageUrl(),
            'salary' => fake()->numberBetween(1000, 9000),
            'tags' => fake()->words(3, true),
            'company' => fake()->company(),
            'address' => fake()->address(),
            'email' => fake()->unique()->safeEmail(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'phone' => fake()->phoneNumber(),
            'requirements' => fake()->paragraph(),
            'benefits' => fake()->paragraph()
        ];
    }
}
