<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoardItem>
 */
class BoardItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $taskTitles = [
            'Update documentation',
            'Fix bug in authentication',
            'Design new landing page',
            'Review pull request',
            'Schedule team meeting',
            'Implement API endpoint',
            'Write unit tests',
            'Deploy to staging',
            'Research competitors',
            'Optimize database queries',
        ];

        return [
            'board_column_id' => \App\Models\BoardColumn::factory(),
            'title' => fake()->randomElement($taskTitles),
            'description' => fake()->optional()->paragraph(),
            'position' => fake()->numberBetween(0, 20),
            'status' => fake()->randomElement(['pending', 'in_progress', 'completed']),
            'priority' => fake()->optional()->randomElement(['low', 'medium', 'high']),
            'due_date' => fake()->optional()->dateTimeBetween('now', '+30 days'),
            'created_by' => \App\Models\User::factory(),
            'assigned_to' => fake()->optional()->randomElement([\App\Models\User::factory(), null]),
        ];
    }
}
