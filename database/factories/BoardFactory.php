<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $projectTypes = [
            'Marketing Campaign',
            'Product Development',
            'Website Redesign',
            'Client Onboarding',
            'Q1 Goals',
            'Team Building',
            'Sales Pipeline',
            'Content Strategy',
        ];

        return [
            'user_id' => \App\Models\User::factory(),
            'name' => fake()->randomElement($projectTypes).' '.fake()->year(),
            'description' => fake()->optional()->sentence(12),
            'color' => fake()->optional()->hexColor(),
        ];
    }
}
