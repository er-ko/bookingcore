<?php

namespace App\Domain\Booking\Services;

use App\Application\Booking\DTO\CreateBookingData;
use App\Application\Integration\Actions\CreateBookingCalendarEvent;
use App\Application\Integration\Actions\UpdateBookingCalendarEvent;
use App\Domain\Booking\Exceptions\BookingConflictException;
use App\Domain\Booking\Exceptions\BookingStatusException;
use App\Domain\Booking\Exceptions\BookingValidationException;
use App\Domain\Booking\Exceptions\SlotUnavailableException;
use App\Enums\BookingStatus;
use App\Infrastructure\Booking\Repositories\BookingRepository;
use App\Models\Activity;
use App\Models\Booking\Booking;
use App\Models\Unit;
use Carbon\CarbonInterface;

final class BookingService
{
    public function __construct(
        private readonly BookingRepository $bookingRepository,
        private readonly CreateBookingCalendarEvent $createBookingCalendarEvent,
        private readonly UpdateBookingCalendarEvent $updateBookingCalendarEvent,
    ) {
    }

    /**
     * Create a new booking for internal/admin flow.
     */
    public function create(CreateBookingData $data): Booking
    {
        return $this->createBooking(
            data: $data,
            status: BookingStatus::Pending,
            confirmedAt: null,
            publicToken: null,
        );
    }

    /**
     * Create a new booking for public flow.
     */
    public function createPublic(CreateBookingData $data): Booking
    {
        return $this->createBooking(
            data: $data,
            status: BookingStatus::Pending,
            confirmedAt: null,
            publicToken: $this->generateUniquePublicToken(),
        );
    }

    /**
     * Cancel an existing booking.
     */
    public function cancel(Booking $booking): Booking
    {
        if ($booking->status === BookingStatus::Cancelled) {
            throw BookingStatusException::alreadyCancelled();
        }

        if ($booking->status === BookingStatus::Completed) {
            throw BookingStatusException::sameStatus(BookingStatus::Completed->value);
        }

        $booking = $this->bookingRepository->cancelBooking($booking);

        return $this->syncAndFinalizeIfNeeded($booking);
    }

    /**
     * Update the status of an existing booking.
     */
    public function updateStatus(Booking $booking, BookingStatus $status): Booking
    {
        if ($booking->status === BookingStatus::Cancelled) {
            throw BookingStatusException::cancelledCannotBeUpdated();
        }

        if ($status === BookingStatus::Cancelled) {
            throw BookingStatusException::useCancelAction();
        }

        if ($booking->status === $status) {
            throw BookingStatusException::sameStatus($status->value);
        }

        $confirmedAt = $booking->confirmed_at;

        if ($status === BookingStatus::Confirmed && ! $confirmedAt) {
            $confirmedAt = now();
        }

        $booking = $this->bookingRepository->updateBookingStatus(
            booking: $booking,
            status: $status,
            confirmedAt: $confirmedAt,
        );

        return $this->syncAndFinalizeIfNeeded($booking);
    }

    /**
     * Create a booking with shared validation and conflict checks.
     */
    private function createBooking(
        CreateBookingData $data,
        BookingStatus $status,
        mixed $confirmedAt,
        ?string $publicToken,
    ): Booking {
        $activity = $this->resolveActiveActivity($data->activityId);
        $unit = $this->resolveActiveUnit($data->unitId, $data->branchId);

        $this->ensureActivityPricedForUnit($activity->id, $unit->id);

        $startsAt = $data->startsAt;
        $endsAt = $startsAt->addMinutes($activity->duration_minutes);

        $blockedStart = $startsAt->subMinutes($activity->buffer_before_minutes);
        $blockedEnd = $endsAt->addMinutes($activity->buffer_after_minutes);

        $this->ensureNoConflict(
            branchId: $data->branchId,
            unitId: $unit->id,
            blockedStart: $blockedStart,
            blockedEnd: $blockedEnd,
        );

        $customer = $this->bookingRepository->findOrCreateCustomer($data->customer);

        $booking = $this->bookingRepository->createBooking(
            data: $data,
            customer: $customer,
            endsAt: $endsAt,
            status: $status,
            confirmedAt: $confirmedAt,
            publicToken: $publicToken,
        );

        try {
            ($this->createBookingCalendarEvent)($booking);
        } catch (\Throwable $exception) {
            $this->handleCalendarSyncException($booking, $exception);
        }

        return $booking;
    }

    /**
     * Handle calendar sync failure during booking creation.
     */
    private function handleCalendarSyncException(Booking $booking, \Throwable $exception): void
    {
        $this->bookingRepository->deleteBooking($booking);

        throw $exception;
    }

    /**
     * Synchronize booking state to calendar and delete terminal bookings if sync succeeds.
     */
    private function syncAndFinalizeIfNeeded(Booking $booking): Booking
    {
        ($this->updateBookingCalendarEvent)($booking);

        if ($booking->status->isTerminal()) {
            $this->bookingRepository->deleteBooking($booking);
        }

        return $booking;
    }

    /**
     * Resolve an active activity by its identifier.
     */
    private function resolveActiveActivity(int $activityId): Activity
    {
        $activity = $this->bookingRepository->getActiveActivityById($activityId);

        if (! $activity) {
            throw BookingValidationException::activityInactive();
        }

        return $activity;
    }

    /**
     * Resolve an active unit for the given branch.
     */
    private function resolveActiveUnit(int $unitId, int $branchId): Unit
    {
        $unit = $this->bookingRepository->getActiveUnitForBranch(
            unitId: $unitId,
            branchId: $branchId,
        );

        if (! $unit) {
            throw BookingValidationException::unitInvalid();
        }

        return $unit;
    }

    /**
     * Ensure the activity is available for the unit.
     */
    private function ensureActivityPricedForUnit(int $activityId, int $unitId): void
    {
        $isPriced = $this->bookingRepository->isActivityPricedForUnit(
            activityId: $activityId,
            unitId: $unitId,
        );

        if (! $isPriced) {
            throw SlotUnavailableException::activityNotAvailableForUnit();
        }
    }

    /**
     * Ensure no overlapping booking exists for the unit.
     */
    private function ensureNoConflict(
        int $branchId,
        int $unitId,
        CarbonInterface $blockedStart,
        CarbonInterface $blockedEnd,
    ): void {
        $hasConflict = $this->bookingRepository->hasConflict(
            branchId: $branchId,
            unitId: $unitId,
            blockedStart: $blockedStart,
            blockedEnd: $blockedEnd,
        );

        if ($hasConflict) {
            throw BookingConflictException::unitAlreadyBooked();
        }
    }

    /**
     * Generate a unique public booking token.
     */
    private function generateUniquePublicToken(): string
    {
        do {
            $token = bin2hex(random_bytes(32));
        } while (
            Booking::query()->where('public_token', $token)->exists()
        );

        return $token;
    }
}
