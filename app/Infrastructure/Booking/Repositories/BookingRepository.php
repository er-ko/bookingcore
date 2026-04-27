<?php

namespace App\Infrastructure\Booking\Repositories;

use App\Application\Booking\DTO\CreateBookingData;
use App\Application\Booking\DTO\CustomerData;
use App\Enums\BookingStatus;
use App\Models\Activity;
use App\Models\Booking\Booking;
use App\Models\Customer;
use App\Models\Unit;
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
     * Get an active unit by its identifier and branch.
     */
    public function getActiveUnitForBranch(int $unitId, int $branchId): ?Unit
    {
        return Unit::query()
            ->active()
            ->whereKey($unitId)
            ->where('branch_id', $branchId)
            ->first();
    }

    /**
     * Determine whether the activity is priced for the unit.
     */
    public function isActivityPricedForUnit(int $activityId, int $unitId): bool
    {
        return Unit::query()
            ->whereKey($unitId)
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
        if ($customerData->email !== null) {
            $customer = Customer::query()
                ->where('email', $customerData->email)
                ->first();

            if ($customer) {
                $customer->update([
                    'first_name' => $customerData->firstName,
                    'last_name' => $customerData->lastName,
                    'phone_code' => $customerData->phoneCode,
                    'phone' => $customerData->phone,
                ]);

                return $customer->refresh();
            }
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
     * for the unit within the given blocked interval.
     */
    public function hasConflict(
        int $branchId,
        int $unitId,
        CarbonInterface $blockedStart,
        CarbonInterface $blockedEnd,
    ): bool {
        return Booking::query()
            ->where('branch_id', $branchId)
            ->where('unit_id', $unitId)
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
        ?string $publicToken = null,
    ): Booking {
        return Booking::create([
            'public_token' => $publicToken,
            'branch_id' => $data->branchId,
            'unit_id' => $data->unitId,
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

    /**
     * Delete the given booking.
     */
    public function deleteBooking(Booking $booking): void
    {
        $booking->delete();
    }
}