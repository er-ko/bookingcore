<?php

namespace Tests\Feature\Integration;

use App\Application\Integration\Actions\SelectIntegrationCalendar;
use App\Enums\IntegrationProvider;
use App\Enums\IntegrationType;
use App\Models\Integration\Integration;
use App\Models\Integration\IntegrationCalendarSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use RuntimeException;
use Tests\TestCase;

final class SelectIntegrationCalendarTest extends TestCase
{
    use RefreshDatabase;

    private SelectIntegrationCalendar $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = app(SelectIntegrationCalendar::class);
    }

    public function test_it_creates_calendar_settings_when_they_do_not_exist(): void
    {
        $user = User::factory()->create();

        $integration = $this->makeIntegration($user);

        $result = ($this->action)(
            $user,
            $integration,
            'primary',
        );

        $this->assertInstanceOf(Integration::class, $result);

        $this->assertDatabaseHas('integration_calendar_settings', [
            'integration_id' => $integration->id,
            'selected_calendar_id' => 'primary',
            'sync_mode' => 'soft',
        ]);
    }

    public function test_it_updates_existing_calendar_settings(): void
    {
        $user = User::factory()->create();

        $integration = $this->makeIntegration($user);

        IntegrationCalendarSetting::create([
            'integration_id' => $integration->id,
            'selected_calendar_id' => 'old-calendar',
            'sync_mode' => 'strict',
        ]);

        ($this->action)(
            $user,
            $integration,
            'primary',
        );

        $this->assertDatabaseHas('integration_calendar_settings', [
            'integration_id' => $integration->id,
            'selected_calendar_id' => 'primary',
            'sync_mode' => 'strict',
        ]);

        $this->assertDatabaseCount('integration_calendar_settings', 1);
    }

    public function test_it_returns_integration_with_loaded_calendar_settings(): void
    {
        $user = User::factory()->create();

        $integration = $this->makeIntegration($user);

        $result = ($this->action)(
            $user,
            $integration,
            'primary',
        );

        $this->assertTrue($result->relationLoaded('calendarSettings'));
        $this->assertNotNull($result->calendarSettings);
        $this->assertSame('primary', $result->calendarSettings->selected_calendar_id);
        $this->assertSame('soft', $result->calendarSettings->sync_mode);
    }

    public function test_it_throws_exception_when_calendar_id_is_empty(): void
    {
        $user = User::factory()->create();

        $integration = $this->makeIntegration($user);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('The selected calendar ID is invalid.');

        ($this->action)(
            $user,
            $integration,
            '   ',
        );
    }

    public function test_it_throws_exception_when_integration_does_not_belong_to_authenticated_user(): void
    {
        $user = User::factory()->create();
        $anotherUser = User::factory()->create();

        $integration = $this->makeIntegration($anotherUser);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('The selected integration does not belong to the authenticated user.');

        ($this->action)(
            $user,
            $integration,
            'primary',
        );
    }

    public function test_it_throws_exception_when_integration_is_inactive(): void
    {
        $user = User::factory()->create();

        $integration = $this->makeIntegration($user, isActive: false);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('The selected integration is inactive.');

        ($this->action)(
            $user,
            $integration,
            'primary',
        );
    }

    private function makeIntegration(User $user, bool $isActive = true): Integration
    {
        return Integration::create([
            'user_id' => $user->id,
            'type' => IntegrationType::Calendar,
            'provider' => IntegrationProvider::Google,
            'provider_account_id' => 'google-account-123',
            'email' => 'johndoe@email.com',
            'name' => 'John Doe',
            'access_token' => 'fake-access-token',
            'refresh_token' => 'fake-refresh-token',
            'token_expires_at' => now()->addHour(),
            'scopes' => ['calendar'],
            'meta' => [],
            'is_active' => $isActive,
            'is_primary' => true,
        ]);
    }
}
