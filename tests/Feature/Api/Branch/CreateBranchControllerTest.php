<?php

use App\Models\Branch;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates a branch through the API', function () {
    // Arrange
    $user = User::factory()->create();

    $payload = createBranchPayload(
        name: 'Brno',
        addressLine1: 'Street 1',
        addressLine2: 'Street 2',
        city: 'Brno',
        postcode: '60200',
        countryCode: 'cz',
        timezone: 'Europe/Prague',
        isActive: true,
    );

    // Act
    $response = $this
        ->actingAs($user)
        ->postJson(route('api.branches.store'), $payload);

    // Assert
    $response
        ->assertCreated()
        ->assertJson([
            'message' => __('branch.messages.created'),
        ]);

    $this->assertDatabaseCount('branches', 1);

    $this->assertDatabaseHas('branches', [
        'user_id' => $user->id,
        'name' => 'Brno',
        'address_line_1' => 'Street 1',
        'address_line_2' => 'Street 2',
        'city' => 'Brno',
        'postcode' => '60200',
        'country_code' => 'CZ',
        'timezone' => 'Europe/Prague',
        'is_active' => true,
    ]);

    expect(Branch::first()?->public_id)->not->toBeEmpty();
});

it('returns a validation error when required data are missing', function () {
    // Arrange
    $user = User::factory()->create();

    // Act
    $response = $this
        ->actingAs($user)
        ->postJson(route('api.branches.store'), []);

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors([
            'name',
            'timezone',
            'is_active',
        ]);
});

it('normalizes country code to uppercase before storing', function () {
    // Arrange
    $user = User::factory()->create();

    $payload = createBranchPayload(
        name: 'Praha',
        addressLine1: 'Main Street 10',
        addressLine2: null,
        city: 'Praha',
        postcode: '11000',
        countryCode: 'cz',
        timezone: 'Europe/Prague',
        isActive: true,
    );

    // Act
    $response = $this
        ->actingAs($user)
        ->postJson(route('api.branches.store'), $payload);

    // Assert
    $response->assertCreated();

    $this->assertDatabaseHas('branches', [
        'user_id' => $user->id,
        'name' => 'Praha',
        'country_code' => 'CZ',
    ]);
});

it('creates an inactive branch through the API', function () {
    // Arrange
    $user = User::factory()->create();

    $payload = createBranchPayload(
        name: 'Ostrava',
        addressLine1: 'Industrial 25',
        addressLine2: null,
        city: 'Ostrava',
        postcode: '70030',
        countryCode: 'CZ',
        timezone: 'Europe/Prague',
        isActive: false,
    );

    // Act
    $response = $this
        ->actingAs($user)
        ->postJson(route('api.branches.store'), $payload);

    // Assert
    $response->assertCreated();

    $this->assertDatabaseHas('branches', [
        'user_id' => $user->id,
        'name' => 'Ostrava',
        'is_active' => false,
    ]);
});

/**
 * Create a branch API payload for tests.
 *
 * @return array<string, mixed>
 */
function createBranchPayload(
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