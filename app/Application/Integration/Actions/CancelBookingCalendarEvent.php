<?php

namespace App\Application\Integration\Actions;

use App\Domain\Integration\Policies\BookingCalendarSyncPolicy;
use App\Enums\IntegrationProvider;
use App\Enums\IntegrationType;
use App\Infrastructure\Integration\Repositories\BookingCalendarEventRepository;
use App\Infrastructure\Integration\Repositories\IntegrationRepository;
use App\Infrastructure\Integration\Resolvers\CalendarProviderResolver;
use App\Models\Booking\Booking;
use App\Models\Integration\BookingCalendarEvent;
use Illuminate\Support\Facades\DB;

final class CancelBookingCalendarEvent
{
    public function __construct(
        private readonly IntegrationRepository $integrations,
        private readonly BookingCalendarEventRepository $bookingCalendarEvents,
        private readonly CalendarProviderResolver $calendarProviderResolver,
        private readonly BookingCalendarSyncPolicy $bookingCalendarSyncPolicy,
        private readonly EnsureValidGoogleAccessTokenAction $ensureValidGoogleAccessTokenAction,
    ) {
    }

    /**
     * Cancel the external calendar event for the given booking.
     */
    public function __invoke(Booking $booking): ?BookingCalendarEvent
    {
        $ownerUserId = $this->resolveOwnerUserId($booking);

        if (! $ownerUserId) {
            return null;
        }

        $integration = $this->integrations->findPrimary(
            userId: $ownerUserId,
            type: IntegrationType::Calendar,
            provider: IntegrationProvider::Google,
        );

        if (! $this->bookingCalendarSyncPolicy->canSync($integration)) {
            return null;
        }

        $integration = ($this->ensureValidGoogleAccessTokenAction)($integration);
        $integration->loadMissing('calendarSettings');

        $calendarId = $this->bookingCalendarSyncPolicy->selectedCalendarId($integration);

        if (! $calendarId) {
            return null;
        }

        $mapping = $this->bookingCalendarEvents->findByBookingIntegrationAndCalendar(
            bookingId: $booking->id,
            integrationId: $integration->id,
            calendarId: $calendarId,
        );

        if (! $mapping) {
            return null;
        }

        if ($mapping->isDeleted()) {
            return $mapping;
        }

        $provider = $this->calendarProviderResolver->resolve($integration->provider);

        return DB::transaction(function () use (
            $integration,
            $calendarId,
            $mapping,
            $provider,
        ): BookingCalendarEvent {
            try {
                $provider->deleteEvent(
                    integration: $integration,
                    calendarId: $calendarId,
                    eventId: $mapping->provider_event_id,
                );

                return $this->bookingCalendarEvents->markDeleted($mapping);
            } catch (\Throwable $exception) {
                $this->bookingCalendarEvents->markFailed(
                    $mapping,
                    $exception->getMessage(),
                );

                throw $exception;
            }
        });
    }

    /**
     * Resolve the BookingCore owner user ID for the booking.
     */
    private function resolveOwnerUserId(Booking $booking): ?int
    {
        return $booking->branch?->user_id;
    }
}