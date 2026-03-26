<?php

use App\Models\Branch;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('deletes a unit through the API', function () {
    // Arrange
    $user = User::factory()->create();
    $branch = createUnitDeleteTestBranch($user->id);

    $unit = createUnitForDeleteTest($user->id, $branch->id, [
        'name' => 'Chair A',
    ]);

    // Act
    $response = $this
        ->actingAs($user)
        ->deleteJson(route('api.units.destroy', $unit->public_id));

    // Assert
    $response
        ->assertOk()
        ->assertJson([
            'message' => __('unit.messages.deleted'),
        ]);

    $this->assertDatabaseMissing('units', [
        'id' => $unit->id,
    ]);
});

it('returns not found when the unit does not exist', function () {
    // Arrange
    $user = User::factory()->create();

    // Act
    $response = $this
        ->actingAs($user)
        ->deleteJson(route('api.units.destroy', 'un_missing123'));

    // Assert
    $response->assertNotFound();
});

/**
 * Create a branch for delete unit API tests.
 */
function createUnitDeleteTestBranch(int $userId, array $attributes = []): Branch
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
 * Create a unit for delete unit API tests.
 */
function createUnitForDeleteTest(int $userId, int $branchId, array $attributes = []): Unit
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