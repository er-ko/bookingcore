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
        Schema::create('integration_calendar_settings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('integration_id')->constrained('integrations')->cascadeOnDelete();

            $table->string('selected_calendar_id', 191)->nullable();

            $table->string('sync_mode', 16)->default('soft');

            $table->timestamps();

            $table->unique('integration_id', 'ics_integration_unique');
            $table->index('sync_mode', 'ics_sync_mode_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integration_calendar_settings');
    }
};