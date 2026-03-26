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
        Schema::create('time_offs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('unit_id')->constrained('units')->cascadeOnDelete();

            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->string('reason', 255)->nullable();

            $table->timestamps();

            $table->index(['unit_id', 'starts_at', 'ends_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_offs');
    }
};
