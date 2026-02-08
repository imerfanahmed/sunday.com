<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create 2 boards for the test user
        $user->boards()->createMany([
            [
                'name' => 'Marketing Campaign 2026',
                'description' => 'Q1 marketing initiatives and campaigns',
                'color' => '#3B82F6',
            ],
            [
                'name' => 'Product Development',
                'description' => 'MVP features and enhancements',
                'color' => '#10B981',
            ],
        ])->each(function ($board) use ($user) {
            // Create columns for each board
            $columns = $board->columns()->createMany([
                ['name' => 'To Do', 'position' => 0, 'color' => '#EF4444'],
                ['name' => 'In Progress', 'position' => 1, 'color' => '#F59E0B'],
                ['name' => 'Done', 'position' => 2, 'color' => '#10B981'],
            ]);

            // Create items in each column
            foreach ($columns as $column) {
                for ($i = 0; $i < rand(2, 5); $i++) {
                    $column->items()->create([
                        'title' => fake()->sentence(4),
                        'description' => fake()->optional()->paragraph(),
                        'position' => $i,
                        'status' => fake()->randomElement(['pending', 'in_progress', 'completed']),
                        'priority' => fake()->optional()->randomElement(['low', 'medium', 'high']),
                        'due_date' => fake()->optional()->dateTimeBetween('now', '+30 days'),
                        'created_by' => $user->id,
                        'assigned_to' => fake()->optional()->passthrough($user->id),
                    ]);
                }
            }
        });
    }
}
