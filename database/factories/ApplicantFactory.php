<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'contact_phone' => fake()->unique()->phoneNumber(),
            'contact_email' => fake()->unique()->safeEmail(),
            'message' => fake()->text(),
            'location' => fake()->city(),
            'resume_path' => fake()->url()
        ];
    }
}
