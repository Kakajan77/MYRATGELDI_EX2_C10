<?php

namespace Database\Seeders;

use App\Models\Freelancer;
use App\Models\Job;
use App\Models\Proposal;
use App\Models\Review;
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
        User::factory()->count(rand(20,30))->create();

        Freelancer::factory()->count(rand(5,10))->create();

        Job::factory()->count(rand(20,30))->create();

        Proposal::factory()->count(rand(20,30))->create();

        Review::factory()->count(rand(20,30))->create();
    }
}
