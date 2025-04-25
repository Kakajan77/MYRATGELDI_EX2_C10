<?php

namespace Database\Factories;

use App\Models\Freelancer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $job = Job::InRandomOrder()->first();
        $user = User::InRandomOrder()->first();
        $freelancer = Freelancer::InRandomorder()->first();
        return [
            'job_id'=>$job->id,
            'user_id'=>$user->id,
            'freelancer_id'=>$freelancer->id,
            'start_date'=>fake()->dateTime(),
            'end_date'=>fake()->dateTime(),
            'amount'=>fake()->numberBetween(10,99999),
            'status' => fake()->randomElement(['active', 'completed', 'cancelled',]),
        ];
    }
}
