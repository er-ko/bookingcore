<?php

use App\Application\Integration\Actions\CancelBookingCalendarEvent;
use App\Application\Integration\Actions\CreateBookingCalendarEvent;
use App\Application\Integration\Actions\UpdateBookingCalendarEvent;
use App\Domain\Booking\DTO\CreateBookingData;
use App\Domain\Booking\DTO\CustomerData;
use App\Domain\Booking\Exceptions\BookingConflictException;
use App\Domain\Booking\Exceptions\BookingValidationException;
use App\Domain\Booking\Exceptions\SlotUnavailableException;
use App\Domain\Booking\Services\BookingService;
use App\Infrastructure\Booking\Repositories\BookingRepository;
use App\Enums\BookingStatus;
use App\Models\Booking\Activity;
use App\Models\Booking\ActivityAssignment;
use App\Models\Booking\Booking;
use App\Models\Booking\Branch;
use App\Models\Booking\Resource;
use App\Models\Integration\BookingCalendarEvent;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates a booking successfully', function () {
    // Arrange
    [$branch, $resource, $activity] = createBookingScenario();

    $data = createBookingData(
        branchId: $branch->id,
        resourceId: $resource->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
        note: 'Please call before arrival.',
    );

    $service = createBookingService();

    // Act
    $booking = $service->create($data);

    // Assert
    expect($booking)->toBeInstanceOf(Booking::class);
    expect($booking->branch_id)->toBe($branch->id);
    expect($booking->resource_id)->toBe($resource->id);
    expect($booking->activity_id)->toBe($activity->id);
    expect($booking->status)->toBe(BookingStatus::Pending);
    expect($booking->starts_at->format('Y-m-d H:i:s'))->toBe('2026-03-09 10:00:00');
    expect($booking->ends_at->format('Y-m-d H:i:s'))->toBe('2026-03-09 11:00:00');
    expect($booking->note)->toBe('Please call before arrival.');

    expect(Customer::count())->toBe(1);
    expect(Booking::count())->toBe(1);
});

it('throws a conflict exception when the resource is already booked', function () {
    // Arrange
    [$branch, $resource, $activity] = createBookingScenario();

    $existingCustomer = createCustomer(
        firstName: 'Existing',
        lastName: 'Customer',
        email: 'existingcustomer@email.com',
        phoneCode: '+1',
        phone: '987654321',
    );

    Booking::create([
        'branch_id' => $branch->id,
        'resource_id' => $resource->id,
        'activity_id' => $activity->id,
        'customer_id' => $existingCustomer->id,
        'starts_at' => '2026-03-09 10:00:00',
        'ends_at' => '2026-03-09 11:00:00',
        'status' => BookingStatus::Confirmed,
        'note' => null,
        'confirmed_at' => '2026-03-08 12:00:00',
        'cancelled_at' => null,
    ]);

    $data = createBookingData(
        branchId: $branch->id,
        resourceId: $resource->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
    );

    $service = createBookingService();

    // Act
    $service->create($data);
})->throws(BookingConflictException::class);

it('throws a slot unavailable exception when the activity is not assigned to the resource', function () {
    // Arrange
    $branch = createBranch();

    $resource = createResource($branch->id);

    $activity = createActivity(
        durationMinutes: 60,
        bufferBeforeMinutes: 10,
        bufferAfterMinutes: 5,
        isActive: true,
    );

    $data = createBookingData(
        branchId: $branch->id,
        resourceId: $resource->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
    );

    $service = createBookingService();

    // Act
    $service->create($data);
})->throws(SlotUnavailableException::class);

it('reuses an existing customer by email', function () {
    // Arrange
    [$branch, $resource, $activity] = createBookingScenario();

    $existingCustomer = createCustomer(
        firstName: 'John',
        lastName: 'Doe',
        email: 'johndoe@email.com',
        phoneCode: '+1',
        phone: '123456789',
    );

    $data = createBookingData(
        branchId: $branch->id,
        resourceId: $resource->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
    );

    $service = createBookingService();

    // Act
    $booking = $service->create($data);

    // Assert
    expect(Customer::count())->toBe(1);
    expect($booking->customer_id)->toBe($existingCustomer->id);
});

it('throws an exception when the activity is inactive', function () {
    // Arrange
    $branch = createBranch();

    $resource = createResource($branch->id);

    $activity = createActivity(
        durationMinutes: 60,
        bufferBeforeMinutes: 10,
        bufferAfterMinutes: 5,
        isActive: false,
    );

    assignActivityToResource($activity->id, $resource->id);

    $data = createBookingData(
        branchId: $branch->id,
        resourceId: $resource->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
    );

    $service = createBookingService();

    // Act
    $service->create($data);
})->throws(BookingValidationException::class, 'The selected activity does not exist or is inactive.');

it('throws an exception when the resource does not belong to the given branch', function () {
    // Arrange
    $branch = createBranch('Brno');
    $otherBranch = createBranch('Prague');

    $resource = createResource($otherBranch->id);

    $activity = createActivity(
        durationMinutes: 60,
        bufferBeforeMinutes: 10,
        bufferAfterMinutes: 5,
        isActive: true,
    );

    assignActivityToResource($activity->id, $resource->id);

    $data = createBookingData(
        branchId: $branch->id,
        resourceId: $resource->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
    );

    $service = createBookingService();

    // Act
    $service->create($data);
})->throws(
    BookingValidationException::class,
    'The selected resource does not exist, is inactive, or does not belong to the given branch.'
);

/**
 * Create a complete booking scenario with branch, resource, activity,
 * and activity assignment.
 *
 * @return array{0: Branch, 1: Resource, 2: Activity}
 */
function createBookingScenario(): array
{
    $branch = createBranch();

    $resource = createResource($branch->id);

    $activity = createActivity(
        durationMinutes: 60,
        bufferBeforeMinutes: 10,
        bufferAfterMinutes: 5,
        isActive: true,
    );

    assignActivityToResource($activity->id, $resource->id);

    return [$branch, $resource, $activity];
}

/**
 * Create a branch for booking tests.
 */
function createBranch(string $name = 'Brno'): Branch
{
    return Branch::create([
        'name' => $name,
        'timezone' => 'Europe/Prague',
        'is_active' => true,
    ]);
}

/**
 * Create a resource for a branch.
 */
function createResource(int $branchId): Resource
{
    return Resource::create([
        'branch_id' => $branchId,
        'name' => 'Chair A',
        'description' => null,
        'is_active' => true,
    ]);
}

/**
 * Create an activity for booking tests.
 */
function createActivity(
    int $durationMinutes,
    int $bufferBeforeMinutes,
    int $bufferAfterMinutes,
    bool $isActive,
): Activity {
    return Activity::create([
        'name' => 'Consultation',
        'duration_minutes' => $durationMinutes,
        'buffer_before_minutes' => $bufferBeforeMinutes,
        'buffer_after_minutes' => $bufferAfterMinutes,
        'is_active' => $isActive,
    ]);
}

/**
 * Assign an activity to a resource.
 */
function assignActivityToResource(int $activityId, int $resourceId): ActivityAssignment
{
    return ActivityAssignment::create([
        'activity_id' => $activityId,
        'resource_id' => $resourceId,
    ]);
}

/**
 * Create a customer for booking tests.
 */
function createCustomer(
    string $firstName,
    ?string $lastName,
    string $email,
    ?string $phoneCode,
    ?string $phone,
): Customer {
    return Customer::create([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'phone_code' => $phoneCode,
        'phone' => $phone,
    ]);
}

/**
 * Create booking DTO data for tests.
 */
function createBookingData(
    int $branchId,
    int $resourceId,
    int $activityId,
    string $startsAt,
    ?string $note = null,
): CreateBookingData {
    return CreateBookingData::from(
        branchId: $branchId,
        resourceId: $resourceId,
        activityId: $activityId,
        startsAt: $startsAt,
        customer: CustomerData::from(
            firstName: 'John',
            lastName: 'Doe',
            email: 'johndoe@email.com',
            phoneCode: '+1',
            phone: '123456789',
        ),
        note: $note,
    );
}

/**
 * Create a booking service instance for testing.
 */
function createBookingService(): BookingService
{
    return new BookingService(
        new BookingRepository(),
        app(\App\Infrastructure\Integration\Repositories\IntegrationRepository::class),
        app(\App\Domain\Integration\Policies\BookingCalendarSyncPolicy::class),
        app(CreateBookingCalendarEvent::class),
        app(CancelBookingCalendarEvent::class),
        app(UpdateBookingCalendarEvent::class),
    );
}