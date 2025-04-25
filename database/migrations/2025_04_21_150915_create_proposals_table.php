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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignId('freelancer_id')->index()->constrained()->cascadeOnDelete();
            $table->text('cover_letter');
            $table->decimal('bid_amount',8,2)->unsigned();
            $table->timestamp('submitted_at')->useCurrent();
            $table->enum('status', ['sent', 'viewed', 'accepted', 'rejected'])->default('sent');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
