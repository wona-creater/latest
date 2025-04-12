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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., "Master Crypto Trading - Beginner to Pro"
            $table->string('instructor'); // e.g., "CryptoGuru"
            $table->decimal('rating', 3, 1); // e.g., 4.9
            $table->integer('student_count'); // e.g., 2500
            $table->decimal('price', 8, 2); // e.g., 99.00
            $table->integer('duration'); // e.g., 10 hours
            $table->string('category'); // e.g., "Trading", "DeFi"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
