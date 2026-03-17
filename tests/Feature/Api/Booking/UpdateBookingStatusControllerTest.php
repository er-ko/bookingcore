<?php

use App\Enums\BookingStatus;
use App\Models\Booking\Activity;
use App\Models\Booking\Booking;
use App\Models\Booking\Branch;
use App\Models\Booking\Resource;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('updates a booking status from pending to confirmed through the API', function () {
    // Arrange
    $booking = createStatusBookingForApiTest(
        status: BookingStatus::Pending,
        confirmedAt: null,
        cancelledAt: null,
    );

    // Act
    $response = $this->patchJson("/api/bookings/{$booking->id}/status", [
        'status' => BookingStatus::Confirmed->value,
    ]);

    // Assert
    $response
        ->assertOk()
        ->assertJson([
            'message' => 'Booking status updated successfully.',
        ]);

    $this->assertDatabaseHas('bookings', [
        'id' => $booking->id,
        'status' => BookingStatus::Confirmed->value,
    ]);

    expect($booking->fresh()->confirmed_at)->not->toBeNull();
});

it('updates a booking status from confirmed to completed through the API', function () {
    // Arrange
    $booking = createStatusBookingForApiTest(
        status: BookingStatus::Confirmed,
        confirmedAt: '2026-03-08 12:00:00',
        cancelledAt: null,
    );

    // Act
    $response = $this->patchJson("/api/bookings/{$booking->id}/status", [
        'status' => BookingStatus::Completed->value,
    ]);

    // Assert
    $response
        ->assertOk()
        ->assertJson([
            'message' => 'Booking status updated successfully.',
        ]);

    $this->assertDatabaseHas('bookings', [
        'id' => $booking->id,
        'status' => BookingStatus::Completed->value,
    ]);

    expect($booking->fresh()->confirmed_at)->not->toBeNull();
});

it('returns an error when trying to update a cancelled booking', function () {
    // Arrange
    $booking = createStatusBookingForApiTest(
        status: BookingStatus::Cancelled,
        confirmedAt: null,
        cancelledAt: '2026-03-08 12:00:00',
    );

    // Act
    $response = $this->patchJson("/api/bookings/{$booking->id}/status", [
        'status' => BookingStatus::Confirmed->value,
    ]);

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJson([
            'message' => 'Cancelled bookings cannot be updated.',
        ]);
});

it('returns an error when trying to set the same booking status', function () {
    // Arrange
    $booking = createStatusBookingForApiTest(
        status: BookingStatus::Confirmed,
        confirmedAt: '2026-03-08 12:00:00',
        cancelledAt: null,
    );

    // Act
    $response = $this->patchJson("/api/bookings/{$booking->id}/status", [
        'status' => BookingStatus::Confirmed->value,
    ]);

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJson([
            'message' => 'The booking is already marked as confirmed.',
        ]);
});

it('returns an error when trying to cancel a booking through the status endpoint', function () {
    // Arrange
    $booking = createStatusBookingForApiTest(
        status: BookingStatus::Pending,
        confirmedAt: null,
        cancelledAt: null,
    );

    // Act
    $response = $this->patchJson("/api/bookings/{$booking->id}/status", [
        'status' => BookingStatus::Cancelled->value,
    ]);

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJson([
            'message' => 'Use the cancel booking action to cancel a booking.',
        ]);
});

/**
 * Create a booking record for API status update tests.
 */
function createStatusBookingForApiTest(
    BookingStatus $status,
    ?string $confirmedAt,
    ?string $cancelledAt,
): Booking {
    $branch = createStatusApiBranch();
    $resource = createStatusApiResource($branch->id);
    $activity = createStatusApiActivity();
    $customer = createStatusApiCustomer();

    return Booking::create([
        'branch_id' => $branch->id,
        'resource_id' => $resource->id,
        'activity_id' => $activity->id,
        'customer_id' => $customer->id,
        'starts_at' => '2026-03-09 10:00:00',
        'ends_at' => '2026-03-09 11:00:00',
        'status' => $status->value,
        'note' => null,
        'confirmed_at' => $confirmedAt,
        'cancelled_at' => $cancelledAt,
    ]);
}

/**
 * Create a branch for booking status API tests.
 */
function createStatusApiBranch(): Branch
{
    return Branch::create([
        'name' => 'Brno',
        'timezone' => 'Europe/Prague',
        'is_active' => true,
    ]);
}

/**
 * Create a resource for booking status API tests.
 */
function createStatusApiResource(int $branchId): Resource
{
    return Resource::create([
        'branch_id' => $branchId,
        'name' => 'Chair A',
        'description' => null,
        'is_active' => true,
    ]);
}

/**
 * Create an activity for booking status API tests.
 */
function createStatusApiActivity(): Activity
{
    return Activity::create([
        'name' => 'Consultation',
        'duration_minutes' => 60,
        'buffer_before_minutes' => 10,
        'buffer_after_minutes' => 5,
        'is_active' => true,
    ]);
}

/**
 * Create a customer for booking status API tests.
 */
function createStatusApiCustomer(): Customer
{
    return Customer::create([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'johndoe@email.com',
        'phone_code' => '+1',
        'phone' => '123456789',
    ]);
}