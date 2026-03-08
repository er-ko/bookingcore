<?php

namespace App\Domain\Booking\Services;

use App\Domain\Booking\DTO\CreateBookingData;
use App\Domain\Booking\Exceptions\BookingConflictException;
use App\Domain\Booking\Exceptions\BookingStatusException;
use App\Domain\Booking\Exceptions\BookingValidationException;
use App\Domain\Booking\Exceptions\SlotUnavailableException;
use App\Enums\BookingStatus;
use App\Infrastructure\Booking\Repositories\BookingRepository;
use App\Models\Activity;
use App\Models\Booking;
use App\Models\Resource;
use Carbon\CarbonInterface;

final class BookingService
{
    public function __construct(
        private readonly BookingRepository $bookingRepository,
    ) {
    }

    /**
     * Create a new booking.
     */
    public function create(CreateBookingData $data): Booking
    {
        $activity = $this->resolveActiveActivity($data->activityId);
        $resource = $this->resolveActiveResource($data->resourceId, $data->branchId);

        $this->ensureActivityAssignedToResource($activity->id, $resource->id);

        $startsAt = $data->startsAt;
        $endsAt = $startsAt->addMinutes($activity->duration_minutes);

        $blockedStart = $startsAt->subMinutes($activity->buffer_before_minutes);
        $blockedEnd = $endsAt->addMinutes($activity->buffer_after_minutes);

        $this->ensureNoConflict(
            branchId: $data->branchId,
            resourceId: $resource->id,
            blockedStart: $blockedStart,
            blockedEnd: $blockedEnd,
        );

        $customer = $this->bookingRepository->findOrCreateCustomer($data->customer);

        return $this->bookingRepository->createBooking(
            data: $data,
            customer: $customer,
            endsAt: $endsAt,
            status: BookingStatus::Pending,
            confirmedAt: null,
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

        return $this->bookingRepository->cancelBooking($booking);
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

        return $this->bookingRepository->updateBookingStatus(
            booking: $booking,
            status: $status,
            confirmedAt: $confirmedAt,
        );
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
     * Resolve an active resource for the given branch.
     */
    private function resolveActiveResource(int $resourceId, int $branchId): Resource
    {
        $resource = $this->bookingRepository->getActiveResourceForBranch(
            resourceId: $resourceId,
            branchId: $branchId,
        );

        if (! $resource) {
            throw BookingValidationException::resourceInvalid();
        }

        return $resource;
    }

    /**
     * Ensure the activity is assigned to the resource.
     */
    private function ensureActivityAssignedToResource(int $activityId, int $resourceId): void
    {
        $isAssigned = $this->bookingRepository->isActivityAssignedToResource(
            activityId: $activityId,
            resourceId: $resourceId,
        );

        if (! $isAssigned) {
            throw SlotUnavailableException::activityNotAssigned();
        }
    }

    /**
     * Ensure no overlapping booking exists for the resource.
     */
    private function ensureNoConflict(
        int $branchId,
        int $resourceId,
        CarbonInterface $blockedStart,
        CarbonInterface $blockedEnd,
    ): void {
        $hasConflict = $this->bookingRepository->hasConflict(
            branchId: $branchId,
            resourceId: $resourceId,
            blockedStart: $blockedStart,
            blockedEnd: $blockedEnd,
        );

        if ($hasConflict) {
            throw BookingConflictException::resourceAlreadyBooked();
        }
    }
}