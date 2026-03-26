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
        Schema::create('recurring_time_offs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('unit_id')->constrained('units')->cascadeOnDelete();

            $table->unsignedTinyInteger('day_of_week');

            $table->time('start_time');
            $table->time('end_time');

            $table->string('reason')->nullable();

            $table->boolean('is_active')->default(true);

            $table->date('valid_from')->nullable();
            $table->date('valid_until')->nullable();

            $table->timestamps();

            $table->index(['unit_id', 'day_of_week', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recurring_time_offs');
    }
};