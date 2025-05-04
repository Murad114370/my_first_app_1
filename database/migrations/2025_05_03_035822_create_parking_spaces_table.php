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
        Schema::create('parking_spaces', function (Blueprint $table) {
            $table->id();
            $table->string('space_number')->unique();  // Must be unique
            $table->string('location');
            $table->enum('type', ['standard', 'compact', 'handicapped', 'electric'])->default('standard');
            $table->boolean('is_available')->default(true);
            $table->decimal('hourly_rate', 8, 2)->default(5.00);
            $table->string('current_vehicle_plate')->nullable();
            $table->timestamp('occupied_at')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->text('notes')->nullable();
            $table->softDeletes();  // For archiving instead of deleting
            $table->timestamps();

            // Indexes for better performance
            $table->index('is_available');
            $table->index('type');
            $table->index('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_spaces');
    }
};