<?php

namespace Database\Factories;
use App\Models\Contract;
use App\Models\Freelancer;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        // Randomly choose reviewer and reviewee types
        $reviewerType = $this->faker->randomElement([User::class, Freelancer::class]);
        $revieweeType = $reviewerType === User::class ? Freelancer::class : User::class;

        $reviewer = $reviewerType::inRandomOrder()->first() ?? $reviewerType::factory()->create();
        $reviewee = $revieweeType::inRandomOrder()->first() ?? $revieweeType::factory()->create();

        $contract = Contract::inRandomOrder()->first() ?? Contract::factory()->create();

        return [
            'contract_id'   => $contract->id,
            'reviewer_id'   => $reviewer->id,
            'reviewer_type' => $reviewerType,
            'reviewee_id'   => $reviewee->id,
            'reviewee_type' => $revieweeType,
            'rating'        => $this->faker->numberBetween(1, 5),
            'comment'       => $this->faker->sentence(10),
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }
}
