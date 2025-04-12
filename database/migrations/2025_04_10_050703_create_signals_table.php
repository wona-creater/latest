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
        Schema::create('signals', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Basic", "Pro", "Elite"
            $table->decimal('monthly_price', 8, 2); // e.g., 10.00
            $table->integer('signal_count'); // e.g., 5, 20, or unlimited (-1 for unlimited)
            $table->string('timeframes'); // e.g., "1H,4H", "All"
            $table->string('alert_types'); // e.g., "Email", "Email,SMS"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signals');
    }
};
