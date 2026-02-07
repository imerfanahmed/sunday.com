<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoardColumn>
 */
class BoardColumnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $columnNames = [
            'To Do',
            'In Progress',
            'Done',
            'Backlog',
            'Review',
            'Testing',
            'Ready',
            'Blocked',
        ];

        return [
            'board_id' => \App\Models\Board::factory(),
            'name' => fake()->randomElement($columnNames),
            'position' => fake()->numberBetween(0, 10),
            'color' => fake()->optional()->hexColor(),
        ];
    }
}
