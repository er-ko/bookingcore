<?php

use App\Enums\BookingStatus;
use App\Models\Activity;
use App\Models\Booking;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Resource;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('cancels a booking through the API', function () {
    // Arrange
    $booking = createBookingForApiTest(
        status: BookingStatus::Pending,
        cancelledAt: null,
    );

    // Act
    $response = $this->postJson("/api/bookings/{$booking->id}/cancel");

    // Assert
    $response
        ->assertOk()
        ->assertJson([
            'message' => 'Booking cancelled successfully.',
        ]);

    $this->assertDatabaseHas('bookings', [
        'id' => $booking->id,
        'status' => BookingStatus::Cancelled->value,
    ]);

    expect($booking->fresh()->cancelled_at)->not->toBeNull();
});

it('returns an error when the booking is already cancelled', function () {
    // Arrange
    $booking = createBookingForApiTest(
        status: BookingStatus::Cancelled,
        cancelledAt: '2026-03-08 12:00:00',
    );

    // Act
    $response = $this->postJson("/api/bookings/{$booking->id}/cancel");

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJson([
            'message' => 'The booking is already cancelled.',
        ]);
});

/**
 * Create a booking record for API cancellation tests.
 */
function createBookingForApiTest(
    BookingStatus $status,
    ?string $cancelledAt,
): Booking {
    $branch = createApiTestBranch();
    $resource = createApiTestResource($branch->id);
    $activity = createApiTestActivity();
    $customer = createApiTestCustomer();

    return Booking::create([
        'branch_id' => $branch->id,
        'resource_id' => $resource->id,
        'activity_id' => $activity->id,
        'customer_id' => $customer->id,
        'starts_at' => '2026-03-09 10:00:00',
        'ends_at' => '2026-03-09 11:00:00',
        'status' => $status->value,
        'note' => null,
        'confirmed_at' => null,
        'cancelled_at' => $cancelledAt,
    ]);
}

/**
 * Create a branch for API booking tests.
 */
function createApiTestBranch(): Branch
{
    return Branch::create([
        'name' => 'Brno',
        'timezone' => 'Europe/Prague',
        'is_active' => true,
    ]);
}

/**
 * Create a resource for API booking tests.
 */
function createApiTestResource(int $branchId): Resource
{
    return Resource::create([
        'branch_id' => $branchId,
        'name' => 'Chair A',
        'description' => null,
        'is_active' => true,
    ]);
}

/**
 * Create an activity for API booking tests.
 */
function createApiTestActivity(): Activity
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
 * Create a customer for API booking tests.
 */
function createApiTestCustomer(): Customer
{
    return Customer::create([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'johndoe@email.com',
        'phone_code' => '+1',
        'phone' => '123456789',
    ]);
}