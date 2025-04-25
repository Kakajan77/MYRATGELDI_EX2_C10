<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::InRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'title' => fake() -> jobTitle(),
            'description' => fake() -> paragraph(3),
            'category' =>fake()->randomElement(['Web Development', 'Design', 'Writing', 'Marketing']),
            'budget' => fake()->numberBetween(100, 5000),
            'status' => fake()->randomElement(['open', 'hired', 'closed']),

        ];
    }
}
