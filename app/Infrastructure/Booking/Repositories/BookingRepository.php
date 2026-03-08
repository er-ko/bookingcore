<?php

namespace App\Infrastructure\Booking\Repositories;

use App\Domain\Booking\DTO\CreateBookingData;
use App\Domain\Booking\DTO\CustomerData;
use App\Enums\BookingStatus;
use App\Models\Activity;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Resource;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;

final class BookingRepository
{
    /**
     * Get an active activity by its identifier.
     */
    public function getActiveActivityById(int $activityId): ?Activity
    {
        return Activity::query()
            ->active()
            ->find($activityId);
    }

    /**
     * Get an active resource by its identifier and branch.
     */
    public function getActiveResourceForBranch(int $resourceId, int $branchId): ?Resource
    {
        return Resource::query()
            ->active()
            ->whereKey($resourceId)
            ->where('branch_id', $branchId)
            ->first();
    }

    /**
     * Determine whether the activity is assigned to the resource.
     */
    public function isActivityAssignedToResource(int $activityId, int $resourceId): bool
    {
        return Resource::query()
            ->whereKey($resourceId)
            ->whereHas('activities', function (Builder $query) use ($activityId) {
                $query->whereKey($activityId);
            })
            ->exists();
    }

    /**
     * Find an existing customer by email or create a new one.
     */
    public function findOrCreateCustomer(CustomerData $customerData): Customer
    {
        $customer = Customer::query()
            ->where('email', $customerData->email)
            ->first();

        if ($customer) {
            return $customer;
        }

        return Customer::create([
            'first_name' => $customerData->firstName,
            'last_name' => $customerData->lastName,
            'email' => $customerData->email,
            'phone_code' => $customerData->phoneCode,
            'phone' => $customerData->phone,
        ]);
    }

    /**
     * Determine whether an overlapping non-cancelled booking exists
     * for the resource within the given blocked interval.
     */
    public function hasConflict(
        int $branchId,
        int $resourceId,
        CarbonInterface $blockedStart,
        CarbonInterface $blockedEnd,
    ): bool {
        return Booking::query()
            ->where('branch_id', $branchId)
            ->where('resource_id', $resourceId)
            ->where('status', '!=', BookingStatus::Cancelled->value)
            ->where(function (Builder $query) use ($blockedStart, $blockedEnd) {
                $query->where('starts_at', '<', $blockedEnd)
                    ->where('ends_at', '>', $blockedStart);
            })
            ->exists();
    }

    /**
     * Create a booking record.
     */
    public function createBooking(
        CreateBookingData $data,
        Customer $customer,
        CarbonInterface $endsAt,
        BookingStatus $status,
        ?CarbonInterface $confirmedAt = null,
    ): Booking {
        return Booking::create([
            'branch_id' => $data->branchId,
            'resource_id' => $data->resourceId,
            'activity_id' => $data->activityId,
            'customer_id' => $customer->id,
            'starts_at' => $data->startsAt,
            'ends_at' => $endsAt,
            'status' => $status->value,
            'note' => $data->note,
            'confirmed_at' => $confirmedAt,
            'cancelled_at' => null,
        ]);
    }

    /**
     * Cancel an existing booking.
     */
    public function cancelBooking(Booking $booking): Booking
    {
        $booking->update([
            'status' => BookingStatus::Cancelled->value,
            'cancelled_at' => now(),
        ]);

        return $booking->refresh();
    }

    /**
     * Update the status of an existing booking.
     */
    public function updateBookingStatus(
        Booking $booking,
        BookingStatus $status,
        ?CarbonInterface $confirmedAt = null,
    ): Booking {
        $booking->update([
            'status' => $status->value,
            'confirmed_at' => $confirmedAt,
        ]);

        return $booking->refresh();
    }
}