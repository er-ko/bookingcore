<?php

use App\Models\Branch;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('updates a unit through the API', function () {
    // Arrange
    $user = User::factory()->create();

    $branch = createUnitUpdateTestBranch($user->id, ['name' => 'Brno']);
    $otherBranch = createUnitUpdateTestBranch($user->id, ['name' => 'Ostrava']);

    $unit = createUnitForUpdateTest($user->id, $branch->id, [
        'name' => 'Old Chair',
        'description' => 'Old description',
        'is_active' => true,
    ]);

    $payload = createUpdateUnitPayload(
        branchId: $otherBranch->id,
        name: 'New Chair',
        description: 'New description',
        isActive: false,
    );

    // Act
    $response = $this
        ->actingAs($user)
        ->patchJson(route('api.units.update', $unit->public_id), $payload);

    // Assert
    $response
        ->assertOk()
        ->assertJson([
            'message' => __('unit.messages.updated'),
        ]);

    $this->assertDatabaseHas('units', [
        'id' => $unit->id,
        'user_id' => $user->id,
        'branch_id' => $otherBranch->id,
        'name' => 'New Chair',
        'description' => 'New description',
        'is_active' => false,
    ]);
});

it('returns a validation error when required data are missing', function () {
    // Arrange
    $user = User::factory()->create();
    $branch = createUnitUpdateTestBranch($user->id);
    $unit = createUnitForUpdateTest($user->id, $branch->id);

    // Act
    $response = $this
        ->actingAs($user)
        ->patchJson(route('api.units.update', $unit->public_id), []);

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors([
            'branch_id',
            'name',
            'is_active',
        ]);
});

it('returns a validation error when branch does not belong to the authenticated user', function () {
    // Arrange
    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    $userBranch = createUnitUpdateTestBranch($user->id);
    $foreignBranch = createUnitUpdateTestBranch($otherUser->id);

    $unit = createUnitForUpdateTest($user->id, $userBranch->id);

    $payload = createUpdateUnitPayload(
        branchId: $foreignBranch->id,
        name: 'Updated Chair',
        description: 'Updated description',
        isActive: true,
    );

    // Act
    $response = $this
        ->actingAs($user)
        ->patchJson(route('api.units.update', $unit->public_id), $payload);

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors([
            'branch_id',
        ]);
});

it('returns not found when the unit does not exist', function () {
    // Arrange
    $user = User::factory()->create();
    $branch = createUnitUpdateTestBranch($user->id);

    $payload = createUpdateUnitPayload(
        branchId: $branch->id,
        name: 'Missing Unit',
        description: 'Missing description',
        isActive: true,
    );

    // Act
    $response = $this
        ->actingAs($user)
        ->patchJson(route('api.units.update', 'un_missing123'), $payload);

    // Assert
    $response->assertNotFound();
});

/**
 * Create a branch for update unit API tests.
 */
function createUnitUpdateTestBranch(int $userId, array $attributes = []): Branch
{
    return Branch::create(array_merge([
        'user_id' => $userId,
        'public_id' => 'br_' . Str::random(10),
        'name' => 'Branch',
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
 * Create a unit for update unit API tests.
 */
function createUnitForUpdateTest(int $userId, int $branchId, array $attributes = []): Unit
{
    return Unit::create(array_merge([
        'user_id' => $userId,
        'public_id' => 'un_' . Str::random(10),
        'branch_id' => $branchId,
        'name' => 'Chair A',
        'description' => 'Description',
        'is_active' => true,
    ], $attributes));
}

/**
 * Create an update unit API payload for tests.
 *
 * @return array<string, mixed>
 */
function createUpdateUnitPayload(
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