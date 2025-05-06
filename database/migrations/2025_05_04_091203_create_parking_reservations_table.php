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
        // database/migrations/YYYY_MM_DD_create_parking_reservations_table.php
Schema::create('parking_reservations', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('parking_space_id')->constrained()->onDelete('cascade');
    $table->string('vehicle_number');
    $table->dateTime('start_time');
    $table->dateTime('end_time');
    $table->enum('status', ['reserved', 'active', 'completed', 'cancelled'])->default('reserved');
    $table->decimal('amount', 10, 2);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_reservations');
    }
};
