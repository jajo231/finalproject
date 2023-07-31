<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name($gender = 'male'|'female'),
            'position' => fake()->jobTitle,
            'salary' => fake()->numberBetween($min = 99999, $max = 9999999),
            'email' => fake()->freeEmail,
        ];
    }
}
