<?php

use App\Models\Branch;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('updates a branch through the API', function () {
    // Arrange
    $user = createOnboardedUser();

    $branch = createBranchForUpdateTest($user->id, [
        'name' => 'Old Branch',
        'address_line_1' => 'Old Street 1',
        'address_line_2' => 'Old Street 2',
        'city' => 'Old City',
        'postcode' => '10000',
        'country_code' => 'CZ',
        'timezone' => 'Europe/Prague',
        'is_active' => true,
    ]);

    $payload = createUpdateBranchPayload(
        name: 'New Branch',
        addressLine1: 'New Street 1',
        addressLine2: 'New Street 2',
        city: 'Brno',
        postcode: '60200',
        countryCode: 'sk',
        timezone: 'Europe/Bratislava',
        isActive: false,
    );

    // Act
    $response = $this
        ->actingAs($user)
        ->patch(route('branches.update', $branch->public_id), $payload);

    // Assert
    $response
        ->assertRedirect(route('branches.index'))
        ->assertSessionHas('success', __('branch.messages.updated'));

    $this->assertDatabaseHas('branches', [
        'id' => $branch->id,
        'user_id' => $user->id,
        'name' => 'New Branch',
        'address_line_1' => 'New Street 1',
        'address_line_2' => 'New Street 2',
        'city' => 'Brno',
        'postcode' => '60200',
        'country_code' => 'SK',
        'timezone' => 'Europe/Bratislava',
        'is_active' => false,
    ]);
});

it('returns a validation error when required data are missing', function () {
    // Arrange
    $user = createOnboardedUser();

    $branch = createBranchForUpdateTest($user->id);

    // Act
    $response = $this
        ->from(route('branches.edit', $branch->public_id))
        ->actingAs($user)
        ->patch(route('branches.update', $branch->public_id), []);

    // Assert
    $response
        ->assertRedirect(route('branches.edit', $branch->public_id))
        ->assertSessionHasErrors([
            'name',
            'timezone',
            'is_active',
        ]);
});

it('normalizes country code to uppercase before updating', function () {
    // Arrange
    $user = createOnboardedUser();

    $branch = createBranchForUpdateTest($user->id, [
        'country_code' => 'CZ',
    ]);

    $payload = createUpdateBranchPayload(
        name: 'Updated Branch',
        addressLine1: 'Street 10',
        addressLine2: null,
        city: 'Praha',
        postcode: '11000',
        countryCode: 'de',
        timezone: 'Europe/Prague',
        isActive: true,
    );

    // Act
    $response = $this
        ->actingAs($user)
        ->patch(route('branches.update', $branch->public_id), $payload);

    // Assert
    $response->assertRedirect(route('branches.index'));

    $this->assertDatabaseHas('branches', [
        'id' => $branch->id,
        'country_code' => 'DE',
    ]);
});

it('returns not found when the branch does not exist', function () {
    // Arrange
    $user = createOnboardedUser();

    $payload = createUpdateBranchPayload(
        name: 'Missing Branch',
        addressLine1: 'Street 1',
        addressLine2: null,
        city: 'Brno',
        postcode: '60200',
        countryCode: 'CZ',
        timezone: 'Europe/Prague',
        isActive: true,
    );

    // Act
    $response = $this
        ->actingAs($user)
        ->patch(route('branches.update', 'br_missing123'), $payload);

    // Assert
    $response->assertNotFound();
});

/**
 * Create a branch for update API tests.
 *
 * @param  array<string, mixed>  $attributes
 */
function createBranchForUpdateTest(int $userId, array $attributes = []): Branch
{
    return Branch::create(array_merge([
        'user_id' => $userId,
        'public_id' => 'br_' . \Illuminate\Support\Str::random(10),
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
 * Create a branch update API payload for tests.
 *
 * @return array<string, mixed>
 */
function createUpdateBranchPayload(
    string $name,
    ?string $addressLine1,
    ?string $addressLine2,
    ?string $city,
    ?string $postcode,
    ?string $countryCode,
    string $timezone,
    bool $isActive,
): array {
    return [
        'name' => $name,
        'address_line_1' => $addressLine1,
        'address_line_2' => $addressLine2,
        'city' => $city,
        'postcode' => $postcode,
        'country_code' => $countryCode,
        'timezone' => $timezone,
        'is_active' => $isActive,
    ];
}
