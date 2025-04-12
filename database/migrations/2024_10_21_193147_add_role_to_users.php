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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['user', 'admin'])->default('user')->after('email');
            $table->decimal('balance', 10, 2)->default(0)->after('email');
            $table->text('home_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->enum('document_type', ['drivers_license', 'government_id', 'passport'])->nullable();
            $table->string('document_image')->nullable();
            $table->string('country')->nullable();
            $table->string('image')->nullable();
            $table->enum('kyc_status', ['pending', 'verified', 'rejected'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropcolumn('role','balance','home_address','phone_number','document_type','document_image','kyc_status','country','image');
        });
    }
};
