<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->sentence(3),
            'done' => $this->faker->boolean(50),
            'description' => 'Descrição de exemplo...',
            'deadline' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
