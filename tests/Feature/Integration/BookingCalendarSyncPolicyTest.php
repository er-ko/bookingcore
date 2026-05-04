<?php

namespace Tests\Feature\Integration;

use App\Domain\Integration\Policies\BookingCalendarSyncPolicy;
use App\Enums\IntegrationProvider;
use App\Enums\IntegrationType;
use App\Models\Integration\Integration;
use App\Models\Integration\IntegrationCalendarSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class BookingCalendarSyncPolicyTest extends TestCase
{
    use RefreshDatabase;

    private BookingCalendarSyncPolicy $policy;

    protected function setUp(): void
    {
        parent::setUp();

        $this->policy = app(BookingCalendarSyncPolicy::class);
    }

    /** @test */
    public function test_can_sync_returns_false_when_integration_is_null(): void
    {
        $this->assertFalse($this->policy->canSync(null));
    }

    /** @test */
    public function test_can_sync_returns_false_when_integration_is_inactive(): void
    {
        $integration = $this->makeIntegration(isActive: false);

        IntegrationCalendarSetting::create([
            'integration_id' => $integration->id,
            'selected_calendar_id' => 'primary',
        ]);

        $integration->load('calendarSettings');

        $this->assertFalse($this->policy->canSync($integration));
    }

    /** @test */
    public function test_can_sync_returns_false_when_calendar_settings_are_missing(): void
    {
        $integration = $this->makeIntegration();

        $this->assertFalse($this->policy->canSync($integration));
    }

    /** @test */
    public function test_can_sync_returns_false_when_selected_calendar_id_is_missing(): void
    {
        $integration = $this->makeIntegration();

        IntegrationCalendarSetting::create([
            'integration_id' => $integration->id,
            'selected_calendar_id' => null,
        ]);

        $integration->load('calendarSettings');

        $this->assertFalse($this->policy->canSync($integration));
    }

    /** @test */
    public function test_can_sync_returns_true_when_integration_is_active_and_settings_are_valid(): void
    {
        $integration = $this->makeIntegration();

        IntegrationCalendarSetting::create([
            'integration_id' => $integration->id,
            'selected_calendar_id' => 'primary',
        ]);

        $integration->load('calendarSettings');

        $this->assertTrue($this->policy->canSync($integration));
    }

    /** @test */
    public function test_selected_calendar_id_returns_null_when_integration_is_null(): void
    {
        $this->assertNull($this->policy->selectedCalendarId(null));
    }

    /** @test */
    public function test_selected_calendar_id_returns_null_when_settings_are_missing(): void
    {
        $integration = $this->makeIntegration();

        $this->assertNull($this->policy->selectedCalendarId($integration));
    }

    /** @test */
    public function test_selected_calendar_id_returns_null_when_selected_calendar_is_empty(): void
    {
        $integration = $this->makeIntegration();

        IntegrationCalendarSetting::create([
            'integration_id' => $integration->id,
            'selected_calendar_id' => '',
        ]);

        $integration->load('calendarSettings');

        $this->assertNull($this->policy->selectedCalendarId($integration));
    }

    /** @test */
    public function test_selected_calendar_id_returns_the_selected_calendar(): void
    {
        $integration = $this->makeIntegration();

        IntegrationCalendarSetting::create([
            'integration_id' => $integration->id,
            'selected_calendar_id' => 'primary',
        ]);

        $integration->load('calendarSettings');

        $this->assertSame('primary', $this->policy->selectedCalendarId($integration));
    }

    private function makeIntegration(bool $isActive = true): Integration
    {
        $user = User::factory()->create();

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
