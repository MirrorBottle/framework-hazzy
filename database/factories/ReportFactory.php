<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number'       => "HIRAC-" . fake()->randomNumber(3, true),
            'activity'     => fake()->sentence(),
            'assesment_at' => now(),
            'status'       => rand(1, 4),
        ];
    }
}
