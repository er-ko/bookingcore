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
        Schema::create('booking_calendar_events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('booking_id')->constrained('bookings')->cascadeOnDelete();

            $table->foreignId('integration_id')->constrained('integrations')->cascadeOnDelete();

            $table->string('provider', 32);
            $table->string('calendar_id', 191);
            $table->string('provider_event_id', 191);

            $table->string('status', 32)->default('synced');

            $table->timestamp('synced_at')->nullable();
            $table->text('last_error')->nullable();
            $table->timestamp('last_error_at')->nullable();

            $table->json('meta')->nullable();

            $table->timestamps();

            $table->unique(['booking_id', 'integration_id', 'calendar_id'], 'booking_calendar_events_booking_integration_calendar_unique');
            $table->unique(['integration_id', 'provider_event_id'], 'booking_calendar_events_integration_event_unique');

            $table->index(['provider'], 'booking_calendar_events_provider_index');
            $table->index(['status'], 'booking_calendar_events_status_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_calendar_events');
    }
};
