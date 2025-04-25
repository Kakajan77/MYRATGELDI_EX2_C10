<?php

namespace Database\Factories;

use App\Models\Freelancer;
use App\Models\Job;
use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proposal>
 */
class ProposalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $job = Job::InRandomOrder()->first();
        $freelancer = Freelancer::InRandomOrder()->first();
        return [
            'job_id' => $job ->id,
            'freelancer_id' => $freelancer -> id,
            'cover_letter' => fake()->paragraph(3),
            'bid_amount' => fake()->numberBetween(10,99999),
            'submitted_at' => fake()->dateTime(),
            'status' => fake()->randomElement(['sent', 'viewed', 'accepted','rejected']),
        ];
    }
}
