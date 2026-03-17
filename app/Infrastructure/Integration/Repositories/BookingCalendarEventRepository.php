<?php

namespace App\Infrastructure\Integration\Repositories;

use App\Models\Booking\Booking;
use App\Models\Integration\Integration;
use App\Models\Integration\BookingCalendarEvent;
use Carbon\CarbonInterface;

final class BookingCalendarEventRepository
{
    /**
     * Find a calendar event mapping by booking and integration.
     */
    public function findByBookingAndIntegration(
        int $bookingId,
        int $integrationId,
    ): ?BookingCalendarEvent {
        return BookingCalendarEvent::query()
            ->where('booking_id', $bookingId)
            ->where('integration_id', $integrationId)
            ->first();
    }

    /**
     * Find a calendar event mapping by booking, integration and calendar.
     */
    public function findByBookingIntegrationAndCalendar(
        int $bookingId,
        int $integrationId,
        string $calendarId,
    ): ?BookingCalendarEvent {
        return BookingCalendarEvent::query()
            ->where('booking_id', $bookingId)
            ->where('integration_id', $integrationId)
            ->where('calendar_id', $calendarId)
            ->first();
    }

    /**
     * Create a new external calendar event mapping.
     *
     * @param array<string, mixed>|null $meta
     */
    public function create(
        Booking $booking,
        Integration $integration,
        string $calendarId,
        string $providerEventId,
        string $status = 'synced',
        ?CarbonInterface $syncedAt = null,
        ?array $meta = null,
    ): BookingCalendarEvent {
        return BookingCalendarEvent::create([
            'booking_id' => $booking->id,
            'integration_id' => $integration->id,
            'provider' => $integration->provider->value,
            'calendar_id' => $calendarId,
            'provider_event_id' => $providerEventId,
            'status' => $status,
            'synced_at' => $syncedAt,
            'meta' => $meta,
        ]);
    }

    /**
     * Mark the mapping as successfully synced.
     *
     * @param array<string, mixed>|null $meta
     */
    public function markSynced(
        BookingCalendarEvent $bookingCalendarEvent,
        ?CarbonInterface $syncedAt = null,
        ?array $meta = null,
    ): BookingCalendarEvent {
        $bookingCalendarEvent->update([
            'status' => 'synced',
            'synced_at' => $syncedAt,
            'last_error' => null,
            'last_error_at' => null,
            'meta' => $meta ?? $bookingCalendarEvent->meta,
        ]);

        return $bookingCalendarEvent->refresh();
    }

    /**
     * Mark the mapping as failed.
     */
    public function markFailed(
        BookingCalendarEvent $bookingCalendarEvent,
        string $errorMessage,
    ): BookingCalendarEvent {
        $bookingCalendarEvent->update([
            'status' => 'failed',
            'last_error' => $errorMessage,
            'last_error_at' => now(),
        ]);

        return $bookingCalendarEvent->refresh();
    }

    /**
     * Mark the mapping as deleted.
     */
    public function markDeleted(BookingCalendarEvent $bookingCalendarEvent): BookingCalendarEvent
    {
        $bookingCalendarEvent->update([
            'status' => 'deleted',
        ]);

        return $bookingCalendarEvent->refresh();
    }

    /**
     * Delete the mapping record from the database.
     */
    public function delete(BookingCalendarEvent $bookingCalendarEvent): void
    {
        $bookingCalendarEvent->delete();
    }
}