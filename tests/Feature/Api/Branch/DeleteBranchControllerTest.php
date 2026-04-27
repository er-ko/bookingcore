<?php

use App\Models\Branch;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('deletes a branch through the API', function () {
    // Arrange
    $user = createOnboardedUser();

    $branch = createBranchForDeleteTest($user->id, [
        'name' => 'Brno Branch',
    ]);

    // Act
    $response = $this
        ->actingAs($user)
        ->delete(route('branches.destroy', $branch->public_id));

    // Assert
    $response
        ->assertRedirect(route('branches.index'))
        ->assertSessionHas('success', __('branch.messages.deleted'));

    $this->assertDatabaseMissing('branches', [
        'id' => $branch->id,
    ]);
});

it('returns not found when the branch does not exist', function () {
    // Arrange
    $user = createOnboardedUser();

    // Act
    $response = $this
        ->actingAs($user)
        ->delete(route('branches.destroy', 'br_missing123'));

    // Assert
    $response->assertNotFound();
});

/**
 * Create a branch for delete API tests.
 *
 * @param array<string, mixed> $attributes
 */
function createBranchForDeleteTest(int $userId, array $attributes = []): Branch
{
    return Branch::create(array_merge([
        'user_id' => $userId,
        'public_id' => 'br_' . \Illuminate\Support\Str::random(10),
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
