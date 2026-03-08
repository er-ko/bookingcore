<?php

use App\Domain\Booking\DTO\AvailabilityQuery;
use App\Domain\Booking\Services\AvailabilityService;
use App\Domain\Booking\Services\SlotGenerator;
use App\Infrastructure\Booking\Repositories\AvailabilityRepository;
use App\Enums\BookingStatus;
use App\Enums\DayOfWeek;
use App\Models\Activity;
use App\Models\ActivityAssignment;
use App\Models\Booking;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Resource;
use App\Models\TimeOff;
use App\Models\WorkingHour;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns available slots for a resource on a given day', function () {
    // Arrange
    [$branch, $resource, $activity] = createAvailabilityScenario();

    createWorkingHour(
        resourceId: $resource->id,
        dayOfWeek: DayOfWeek::Monday,
        startTime: '09:00:00',
        endTime: '12:00:00',
    );

    $query = createAvailabilityQuery(
        branchId: $branch->id,
        resourceId: $resource->id,
        activityId: $activity->id,
        date: '2026-03-09',
    );

    $service = createAvailabilityService();

    // Act
    $slots = $service->getAvailableSlots($query);

    // Assert
    expect($slots)->toHaveCount(2);

    expect($slots[0]->start()->format('H:i'))->toBe('09:00');
    expect($slots[0]->end()->format('H:i'))->toBe('10:00');

    expect($slots[1]->start()->format('H:i'))->toBe('10:15');
    expect($slots[1]->end()->format('H:i'))->toBe('11:15');
});

it('splits availability by time off periods', function () {
    // Arrange
    [$branch, $resource, $activity] = createAvailabilityScenario();

    createWorkingHour(
        resourceId: $resource->id,
        dayOfWeek: DayOfWeek::Monday,
        startTime: '09:00:00',
        endTime: '17:00:00',
    );

    TimeOff::create([
        'resource_id' => $resource->id,
        'starts_at' => '2026-03-09 12:00:00',
        'ends_at' => '2026-03-09 13:00:00',
        'reason' => 'Lunch break',
    ]);

    $query = createAvailabilityQuery(
        branchId: $branch->id,
        resourceId: $resource->id,
        activityId: $activity->id,
        date: '2026-03-09',
    );

    $service = createAvailabilityService();

    // Act
    $slots = $service->getAvailableSlots($query);

    // Assert
    expect($slots)->toHaveCount(5);

    expect($slots[0]->start()->format('H:i'))->toBe('09:00');
    expect($slots[0]->end()->format('H:i'))->toBe('10:00');

    expect($slots[1]->start()->format('H:i'))->toBe('10:15');
    expect($slots[1]->end()->format('H:i'))->toBe('11:15');

    expect($slots[2]->start()->format('H:i'))->toBe('13:00');
    expect($slots[2]->end()->format('H:i'))->toBe('14:00');

    expect($slots[3]->start()->format('H:i'))->toBe('14:15');
    expect($slots[3]->end()->format('H:i'))->toBe('15:15');

    expect($slots[4]->start()->format('H:i'))->toBe('15:30');
    expect($slots[4]->end()->format('H:i'))->toBe('16:30');
});

it('excludes slots that conflict with existing bookings', function () {
    // Arrange
    [$branch, $resource, $activity] = createAvailabilityScenario();

    createWorkingHour(
        resourceId: $resource->id,
        dayOfWeek: DayOfWeek::Monday,
        startTime: '09:00:00',
        endTime: '12:00:00',
    );

    $customer = Customer::create([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'johndoe@email.com',
        'phone_code' => '+1',
        'phone' => '123456789',
    ]);

    Booking::create([
        'branch_id' => $branch->id,
        'resource_id' => $resource->id,
        'activity_id' => $activity->id,
        'customer_id' => $customer->id,
        'starts_at' => '2026-03-09 10:25:00',
        'ends_at' => '2026-03-09 11:25:00',
        'status' => BookingStatus::Confirmed,
        'note' => null,
        'confirmed_at' => '2026-03-08 12:00:00',
        'cancelled_at' => null,
    ]);

    $query = createAvailabilityQuery(
        branchId: $branch->id,
        resourceId: $resource->id,
        activityId: $activity->id,
        date: '2026-03-09',
    );

    $service = createAvailabilityService();

    // Act
    $slots = $service->getAvailableSlots($query);

    // Assert
    expect($slots)->toHaveCount(1);

    expect($slots[0]->start()->format('H:i'))->toBe('09:00');
    expect($slots[0]->end()->format('H:i'))->toBe('10:00');
});

/**
 * Create a complete availability test scenario with branch, resource, activity,
 * and activity assignment.
 *
 * @return array{0: Branch, 1: Resource, 2: Activity}
 */
function createAvailabilityScenario(): array
{
    $branch = Branch::create([
        'name' => 'Brno',
        'timezone' => 'Europe/Prague',
        'is_active' => true,
    ]);

    $resource = Resource::create([
        'branch_id' => $branch->id,
        'name' => 'Chair A',
        'description' => null,
        'is_active' => true,
    ]);

    $activity = Activity::create([
        'name' => 'Consultation',
        'duration_minutes' => 60,
        'buffer_before_minutes' => 10,
        'buffer_after_minutes' => 5,
        'is_active' => true,
    ]);

    ActivityAssignment::create([
        'activity_id' => $activity->id,
        'resource_id' => $resource->id,
    ]);

    return [$branch, $resource, $activity];
}

/**
 * Create a working hour record for a resource.
 */
function createWorkingHour(
    int $resourceId,
    DayOfWeek $dayOfWeek,
    string $startTime,
    string $endTime,
): WorkingHour {
    return WorkingHour::create([
        'resource_id' => $resourceId,
        'day_of_week' => $dayOfWeek->value,
        'start_time' => $startTime,
        'end_time' => $endTime,
        'is_active' => true,
    ]);
}

/**
 * Create an availability query DTO for testing.
 */
function createAvailabilityQuery(
    int $branchId,
    int $resourceId,
    int $activityId,
    string $date,
): AvailabilityQuery {
    return AvailabilityQuery::from(
        branchId: $branchId,
        resourceId: $resourceId,
        activityId: $activityId,
        date: $date,
    );
}

/**
 * Create an availability service instance for testing.
 */
function createAvailabilityService(): AvailabilityService
{
    return new AvailabilityService(
        new AvailabilityRepository(),
        new SlotGenerator(),
    );
}