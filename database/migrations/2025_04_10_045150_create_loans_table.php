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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 12, 2); // e.g., 2500.00
            $table->integer('repayment_period'); // e.g., 12 months
            $table->decimal('interest_rate', 5, 2); // e.g., 5.5%
            $table->decimal('monthly_repayment', 12, 2); // e.g., 350.00
            $table->string('loan_type'); // e.g., "Starter Loan", "Pro Loan"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
