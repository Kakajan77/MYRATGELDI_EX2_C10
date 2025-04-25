<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            // Foreign key to contracts
            $table->foreignId('contract_id')->constrained()->cascadeOnDelete();

            // Polymorphic: Reviewer (Client or Freelancer)
            $table->unsignedBigInteger('reviewer_id');
            $table->string('reviewer_type');

            // Polymorphic: Reviewee (Client or Freelancer)
            $table->unsignedBigInteger('reviewee_id');
            $table->string('reviewee_type');

            // Rating: 1 to 5 (validation in code)
            $table->unsignedTinyInteger('rating');

            $table->text('comment')->nullable();

            $table->timestamps();

            // Optional: indexing for faster polymorphic queries
            $table->index(['reviewer_id', 'reviewer_type']);
            $table->index(['reviewee_id', 'reviewee_type']);
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
