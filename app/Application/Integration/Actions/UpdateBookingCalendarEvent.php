<?php

namespace App\Application\Integration\Actions;

use App\Domain\Integration\DTO\CalendarEventData;
use App\Domain\Integration\Policies\BookingCalendarSyncPolicy;
use App\Enums\IntegrationType;
use App\Enums\IntegrationProvider;
use App\Infrastructure\Integration\Repositories\BookingCalendarEventRepository;
use App\Infrastructure\Integration\Repositories\IntegrationRepository;
use App\Infrastructure\Integration\Resolvers\CalendarProviderResolver;
use App\Models\Booking\Booking;
use App\Models\Integration\BookingCalendarEvent;
use Illuminate\Support\Facades\DB;

final class UpdateBookingCalendarEvent
{
    public function __construct(
        private readonly IntegrationRepository $integrations,
        private readonly BookingCalendarEventRepository $bookingCalendarEvents,
        private readonly CalendarProviderResolver $calendarProviderResolver,
        private readonly BookingCalendarSyncPolicy $bookingCalendarSyncPolicy,
    ) {
    }

    /**
     * Update the external calendar event for the given booking.
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

        $eventData = new CalendarEventData(
            title: $this->makeTitle($booking),
            description: $this->makeDescription($booking),
            startsAt: $booking->starts_at,
            endsAt: $booking->ends_at,
            timezone: $booking->branch?->timezone,
            location: $booking->branch?->name,
            attendees: $booking->customer?->email ? [$booking->customer->email] : [],
            meta: [
                'booking_id' => $booking->id,
                'status' => $booking->status?->value,
            ],
        );

        return DB::transaction(function () use (
            $integration,
            $calendarId,
            $mapping,
            $provider,
            $eventData,
        ): BookingCalendarEvent {
            try {
                $provider->updateEvent(
                    integration: $integration,
                    calendarId: $calendarId,
                    eventId: $mapping->provider_event_id,
                    eventData: $eventData,
                );

                return $this->bookingCalendarEvents->markSynced(
                    $mapping,
                    syncedAt: now(),
                    meta: array_merge($mapping->meta ?? [], [
                        'updated_via' => 'booking_status_update',
                    ]),
                );
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
     * Build the calendar event title.
     */
    private function makeTitle(Booking $booking): string
    {
        $activityName = $booking->activity?->name ?? 'Booking';
        $status = $booking->status?->value;

        if (! $status) {
            return $activityName;
        }

        return $activityName . ' (' . ucfirst($status) . ')';
    }

    /**
     * Build the calendar event description.
     */
    private function makeDescription(Booking $booking): ?string
    {
        $lines = [];

        if ($booking->customer) {
            $customerName = trim(
                ($booking->customer->first_name ?? '') . ' ' . ($booking->customer->last_name ?? '')
            );

            if ($customerName !== '') {
                $lines[] = 'Customer: ' . $customerName;
            }

            if ($booking->customer->email) {
                $lines[] = 'Email: ' . $booking->customer->email;
            }

            if ($booking->customer->phone) {
                $lines[] = 'Phone: ' . $booking->customer->phone;
            }
        }

        if ($booking->status) {
            $lines[] = 'Status: ' . ucfirst($booking->status->value);
        }

        if ($booking->note) {
            $lines[] = 'Note: ' . $booking->note;
        }

        return $lines === [] ? null : implode("\n", $lines);
    }

    /**
     * Resolve the BookingCore owner user ID for the booking.
     */
    private function resolveOwnerUserId(Booking $booking): ?int
    {
        return $booking->branch?->user_id;
    }
}