<?php

namespace Tests\Feature\Integration;

use App\Application\Integration\DTO\RefreshedAccessTokenData;
use App\Domain\Integration\Contracts\CalendarProvider;
use App\Enums\IntegrationProvider;
use App\Enums\IntegrationType;
use App\Infrastructure\Integration\Resolvers\CalendarProviderResolver;
use App\Models\Integration\Integration;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

final class RefreshExpiringIntegrationTokensCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_refreshes_expiring_integration_tokens_successfully(): void
    {
        $integration = $this->makeIntegration(
            email: 'roman.kocian@gmail.com',
            expiresAt: now()->addMinutes(5),
        );

        $provider = Mockery::mock(CalendarProvider::class);
        $provider->shouldReceive('refreshAccessToken')
            ->once()
            ->andReturn(new RefreshedAccessTokenData(
                accessToken: 'refreshed-access-token',
                refreshToken: 'refreshed-refresh-token',
                tokenExpiresAt: CarbonImmutable::now()->addHour(),
            ));

        $resolver = Mockery::mock(CalendarProviderResolver::class);
        $resolver->shouldReceive('resolve')
            ->once()
            ->with(IntegrationProvider::Google)
            ->andReturn($provider);

        $this->app->instance(CalendarProviderResolver::class, $resolver);

        $this->artisan('integrations:refresh-expiring-tokens')
            ->expectsOutput("Refreshed integration #{$integration->id} (roman.kocian@gmail.com).")
            ->expectsOutput('Token refresh finished. Refreshed: 1, Failed: 0.')
            ->assertSuccessful();

        $integration = $integration->fresh();

        $this->assertSame('refreshed-access-token', $integration->access_token);
        $this->assertSame('refreshed-refresh-token', $integration->refresh_token);
        $this->assertNotNull($integration->token_expires_at);
        $this->assertNotNull($integration->meta['last_token_refresh_attempt_at'] ?? null);
        $this->assertNotNull($integration->meta['last_token_refresh_at'] ?? null);
        $this->assertNull($integration->meta['last_token_refresh_error'] ?? null);
        $this->assertNull($integration->meta['last_token_refresh_failed_at'] ?? null);
    }

    public function test_it_reports_when_no_expiring_integration_tokens_are_found(): void
    {
        $this->makeIntegration(
            email: 'future@example.com',
            expiresAt: now()->addHours(2),
        );

        $resolver = Mockery::mock(CalendarProviderResolver::class);
        $resolver->shouldNotReceive('resolve');

        $this->app->instance(CalendarProviderResolver::class, $resolver);

        $this->artisan('integrations:refresh-expiring-tokens')
            ->expectsOutput('No expiring integration tokens found.')
            ->assertSuccessful();
    }

    public function test_it_continues_when_one_integration_refresh_fails(): void
    {
        $failedIntegration = $this->makeIntegration(
            email: 'failed@example.com',
            expiresAt: now()->addMinutes(5),
        );

        $successfulIntegration = $this->makeIntegration(
            email: 'success@example.com',
            expiresAt: now()->addMinutes(5),
        );

        $provider = Mockery::mock(CalendarProvider::class);
        $provider->shouldReceive('refreshAccessToken')
            ->twice()
            ->andReturnUsing(function (Integration $integration) use ($failedIntegration) {
                if ($integration->is($failedIntegration)) {
                    throw new \RuntimeException('Temporary network failure while refreshing token.');
                }

                return new RefreshedAccessTokenData(
                    accessToken: 'success-access-token',
                    refreshToken: 'success-refresh-token',
                    tokenExpiresAt: CarbonImmutable::now()->addHour(),
                );
            });

        $resolver = Mockery::mock(CalendarProviderResolver::class);
        $resolver->shouldReceive('resolve')
            ->twice()
            ->with(IntegrationProvider::Google)
            ->andReturn($provider);

        $this->app->instance(CalendarProviderResolver::class, $resolver);

        $this->artisan('integrations:refresh-expiring-tokens')
            ->expectsOutput("Failed to refresh integration #{$failedIntegration->id}: Temporary network failure while refreshing token.")
            ->expectsOutput("Refreshed integration #{$successfulIntegration->id} (success@example.com).")
            ->expectsOutput('Token refresh finished. Refreshed: 1, Failed: 1.')
            ->assertExitCode(1);

        $failedIntegration = $failedIntegration->fresh();
        $successfulIntegration = $successfulIntegration->fresh();

        $this->assertSame('old-access-token', $failedIntegration->access_token);
        $this->assertSame(
            'Temporary network failure while refreshing token.',
            $failedIntegration->meta['last_token_refresh_error'] ?? null
        );
        $this->assertTrue($failedIntegration->is_active);

        $this->assertSame('success-access-token', $successfulIntegration->access_token);
        $this->assertSame('success-refresh-token', $successfulIntegration->refresh_token);
        $this->assertNotNull($successfulIntegration->meta['last_token_refresh_at'] ?? null);
    }

    private function makeIntegration(
        string $email,
        \Carbon\CarbonInterface $expiresAt,
        bool $isActive = true,
        bool $isPrimary = true,
    ): Integration {
        $user = User::factory()->create();

        return Integration::create([
            'user_id' => $user->id,
            'type' => IntegrationType::Calendar,
            'provider' => IntegrationProvider::Google,
            'provider_account_id' => 'google-account-' . uniqid(),
            'email' => $email,
            'name' => 'Test User',
            'access_token' => 'old-access-token',
            'refresh_token' => 'old-refresh-token',
            'token_expires_at' => $expiresAt,
            'scopes' => ['https://www.googleapis.com/auth/calendar'],
            'meta' => [],
            'is_active' => $isActive,
            'is_primary' => $isPrimary,
        ]);
    }
}