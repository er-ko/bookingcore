<?php

use App\Enums\IntegrationProvider;
use App\Enums\IntegrationType;
use App\Models\Branch;
use App\Models\Identity\UserIdentitySettings;
use App\Models\Integration\Integration;
use App\Models\Integration\IntegrationCalendarSetting;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('updates a unit through the API', function () {
    $user = createOnboardedUnitUserV2();
    $branch = createUnitUpdateTestBranchV2($user->id, ['name' => 'Brno']);
    $otherBranch = createUnitUpdateTestBranchV2($user->id, ['name' => 'Ostrava']);

    $unit = createUnitForUpdateTestV2($user->id, $branch->id, [
        'name' => 'Old Chair',
        'description' => 'Old description',
        'is_active' => true,
    ]);

    $payload = createUpdateUnitPayloadV2(
        branchId: $otherBranch->id,
        name: 'New Chair',
        description: 'New description',
        isActive: false,
    );

    $response = $this
        ->actingAs($user)
        ->patchJson(route('api.units.update', $unit->public_id), $payload);

    $response
        ->assertOk()
        ->assertJsonPath('message', __('unit.messages.updated'))
        ->assertJsonPath('data.public_id', $unit->public_id)
        ->assertJsonPath('data.branch_id', $otherBranch->id)
        ->assertJsonPath('data.name', 'New Chair')
        ->assertJsonPath('data.description', 'New description')
        ->assertJsonPath('data.is_active', false);

    $this->assertDatabaseHas('units', [
        'id' => $unit->id,
        'user_id' => $user->id,
        'branch_id' => $otherBranch->id,
        'name' => 'New Chair',
        'description' => 'New description',
        'is_active' => false,
    ]);
});

it('allows clearing the description when updating a unit', function () {
    $user = createOnboardedUnitUserV2();
    $branch = createUnitUpdateTestBranchV2($user->id);
    $unit = createUnitForUpdateTestV2($user->id, $branch->id, [
        'description' => 'Needs to be cleared',
    ]);

    $payload = createUpdateUnitPayloadV2(
        branchId: $branch->id,
        name: 'Chair A',
        description: null,
        isActive: true,
    );

    $response = $this
        ->actingAs($user)
        ->patchJson(route('api.units.update', $unit->public_id), $payload);

    $response
        ->assertOk()
        ->assertJsonPath('data.description', null);

    $this->assertDatabaseHas('units', [
        'id' => $unit->id,
        'description' => null,
    ]);
});

it('returns validation errors when required data are missing', function () {
    $user = createOnboardedUnitUserV2();
    $branch = createUnitUpdateTestBranchV2($user->id);
    $unit = createUnitForUpdateTestV2($user->id, $branch->id);

    $response = $this
        ->actingAs($user)
        ->patchJson(route('api.units.update', $unit->public_id), []);

    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors([
            'branch_id',
            'name',
            'is_active',
        ]);
});

it('returns a validation error when branch does not belong to the authenticated user', function () {
    $user = createOnboardedUnitUserV2();
    $otherUser = createOnboardedUnitUserV2();

    $userBranch = createUnitUpdateTestBranchV2($user->id);
    $foreignBranch = createUnitUpdateTestBranchV2($otherUser->id);

    $unit = createUnitForUpdateTestV2($user->id, $userBranch->id, [
        'name' => 'Original Chair',
        'description' => 'Original description',
    ]);

    $payload = createUpdateUnitPayloadV2(
        branchId: $foreignBranch->id,
        name: 'Updated Chair',
        description: 'Updated description',
        isActive: false,
    );

    $response = $this
        ->actingAs($user)
        ->patchJson(route('api.units.update', $unit->public_id), $payload);

    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['branch_id']);

    $this->assertDatabaseHas('units', [
        'id' => $unit->id,
        'branch_id' => $userBranch->id,
        'name' => 'Original Chair',
        'description' => 'Original description',
        'is_active' => true,
    ]);
});

it('returns not found when the unit does not exist', function () {
    $user = createOnboardedUnitUserV2();
    $branch = createUnitUpdateTestBranchV2($user->id);

    $payload = createUpdateUnitPayloadV2(
        branchId: $branch->id,
        name: 'Missing Unit',
        description: 'Missing description',
        isActive: true,
    );

    $response = $this
        ->actingAs($user)
        ->patchJson(route('api.units.update', 'un_missing123'), $payload);

    $response->assertNotFound();
});

it('returns not found when the unit belongs to another user', function () {
    $user = createOnboardedUnitUserV2();
    $otherUser = createOnboardedUnitUserV2();

    $userBranch = createUnitUpdateTestBranchV2($user->id);
    $otherBranch = createUnitUpdateTestBranchV2($otherUser->id);

    $unit = createUnitForUpdateTestV2($otherUser->id, $otherBranch->id, [
        'name' => 'Private Chair',
    ]);

    $payload = createUpdateUnitPayloadV2(
        branchId: $userBranch->id,
        name: 'Attempted Update',
        description: 'Should not be applied',
        isActive: false,
    );

    $response = $this
        ->actingAs($user)
        ->patchJson(route('api.units.update', $unit->public_id), $payload);

    $response->assertNotFound();

    $this->assertDatabaseHas('units', [
        'id' => $unit->id,
        'user_id' => $otherUser->id,
        'branch_id' => $otherBranch->id,
        'name' => 'Private Chair',
        'is_active' => true,
    ]);
});

function createOnboardedUnitUserV2(): User
{
    $user = User::factory()->create();

    UserIdentitySettings::create([
        'user_id' => $user->id,
        'brand_name' => 'Test Brand',
        'slug' => 'test-' . Str::random(8),
        'default_language_code' => 'en',
        'default_currency_code' => 'USD',
        'default_country_code' => 'US',
        'is_public' => true,
    ]);

    $integration = Integration::create([
        'user_id' => $user->id,
        'type' => IntegrationType::Calendar->value,
        'provider' => IntegrationProvider::Google->value,
        'provider_account_id' => 'google-' . Str::random(8),
        'email' => $user->email,
        'name' => $user->name,
        'access_token' => 'test-access-token',
        'refresh_token' => 'test-refresh-token',
        'token_expires_at' => now()->addHour(),
        'scopes' => ['https://www.googleapis.com/auth/calendar'],
        'is_active' => true,
        'is_primary' => true,
    ]);

    IntegrationCalendarSetting::create([
        'integration_id' => $integration->id,
        'selected_calendar_id' => 'test-calendar@group.calendar.google.com',
    ]);

    return $user->fresh();
}

function createUnitUpdateTestBranchV2(int $userId, array $attributes = []): Branch
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

function createUnitForUpdateTestV2(int $userId, int $branchId, array $attributes = []): Unit
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
 * @return array<string, mixed>
 */
function createUpdateUnitPayloadV2(
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
