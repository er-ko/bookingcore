<?php

use App\Models\Branch;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('creates a unit through the API', function () {
    // Arrange
    $user = User::factory()->create();
    $branch = createUnitTestBranch($user->id);

    $payload = createUnitPayload(
        branchId: $branch->id,
        name: 'Chair A',
        description: 'Arrive 10 min. before.',
        isActive: true,
    );

    // Act
    $response = $this
        ->actingAs($user)
        ->postJson(route('api.units.store'), $payload);

    // Assert
    $response
        ->assertCreated()
        ->assertJson([
            'message' => __('unit.messages.created'),
        ]);

    $this->assertDatabaseCount('units', 1);

    $this->assertDatabaseHas('units', [
        'user_id' => $user->id,
        'branch_id' => $branch->id,
        'name' => 'Chair A',
        'description' => 'Arrive 10 min. before.',
        'is_active' => true,
    ]);

    expect(Unit::first()?->public_id)->not->toBeEmpty();
});

it('returns a validation error when required data are missing', function () {
    // Arrange
    $user = User::factory()->create();

    // Act
    $response = $this
        ->actingAs($user)
        ->postJson(route('api.units.store'), []);

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors([
            'branch_id',
            'name',
            'is_active',
        ]);
});

it('returns a validation error when branch does not exist', function () {
    // Arrange
    $user = User::factory()->create();

    $payload = createUnitPayload(
        branchId: 999999,
        name: 'Chair A',
        description: 'Test description',
        isActive: true,
    );

    // Act
    $response = $this
        ->actingAs($user)
        ->postJson(route('api.units.store'), $payload);

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors([
            'branch_id',
        ]);
});

/**
 * Create a branch for unit API tests.
 */
function createUnitTestBranch(int $userId, array $attributes = []): Branch
{
    return Branch::create(array_merge([
        'user_id' => $userId,
        'public_id' => 'br_' . Str::random(10),
        'name' => 'Brno',
        'address_line_1' => 'Street 1',
        'address_line_2' => 'Street 2',
        'city' => 'City',
        'postcode' => '10000',
        'country_code' => 'CZ',
        'timezone' => 'Europe/Prague',
        'is_active' => true,
    ], $attributes));
}

/**
 * Create a unit API payload for tests.
 *
 * @return array<string, mixed>
 */
function createUnitPayload(
    int $branchId,
    string $name,
    ?string $description,
    bool $isActive,
): array {
    return [
        'branch_id' => $branchId,
        'name' => $name,
        'description' => $description,
        'is_active' => $isActive,
    ];
}