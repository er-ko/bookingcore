<?php

namespace Tests\Feature\Integration;

use App\Application\Integration\DTO\RefreshedAccessTokenData;
use App\Domain\Integration\Contracts\CalendarProvider;
use App\Domain\Integration\Services\RefreshIntegrationService;
use App\Enums\IntegrationProvider;
use App\Enums\IntegrationType;
use App\Infrastructure\Integration\Resolvers\CalendarProviderResolver;
use App\Models\Integration\Integration;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use RuntimeException;
use Tests\TestCase;

final class RefreshIntegrationServiceTest extends TestCase
{
    use RefreshDatabase;

    private RefreshIntegrationService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = app(RefreshIntegrationService::class);
    }

    public function test_it_refreshes_integration_tokens_successfully(): void
    {
        $integration = $this->makeIntegration(
            meta: [
                'requires_reconnect' => true,
                'disconnect_reason' => 'invalid_grant',
                'last_token_refresh_error' => 'Old error',
                'last_token_refresh_failed_at' => now()->subHour()->toIso8601String(),
            ],
        );

        $newExpiresAt = CarbonImmutable::now()->addHour();

        $provider = Mockery::mock(CalendarProvider::class);
        $provider->shouldReceive('refreshAccessToken')
            ->once()
            ->withArgs(function (Integration $passedIntegration) use ($integration): bool {
                return $passedIntegration->is($integration);
            })
            ->andReturn(new RefreshedAccessTokenData(
                accessToken: 'new-access-token',
                refreshToken: 'new-refresh-token',
                tokenExpiresAt: $newExpiresAt,
            ));

        $resolver = Mockery::mock(CalendarProviderResolver::class);
        $resolver->shouldReceive('resolve')
            ->once()
            ->with($integration->provider)
            ->andReturn($provider);

        $this->app->instance(CalendarProviderResolver::class, $resolver);
        $this->service = app(RefreshIntegrationService::class);

        $result = $this->service->refresh($integration);

        $this->assertInstanceOf(Integration::class, $result);
        $this->assertSame('new-access-token', $result->access_token);
        $this->assertSame('new-refresh-token', $result->refresh_token);
        $this->assertEquals($newExpiresAt->toDateTimeString(), $result->token_expires_at?->toDateTimeString());

        $this->assertFalse($result->meta['requires_reconnect']);
        $this->assertNull($result->meta['disconnect_reason']);
        $this->assertNull($result->meta['last_token_refresh_error']);
        $this->assertNull($result->meta['last_token_refresh_failed_at']);
        $this->assertNotNull($result->meta['last_token_refresh_attempt_at'] ?? null);
        $this->assertNotNull($result->meta['last_token_refresh_at'] ?? null);

        $this->assertTrue($result->is_active);
        $this->assertTrue($result->is_primary);
    }

    public function test_it_deactivates_integration_on_permanent_refresh_failure(): void
    {
        $integration = $this->makeIntegration();

        $provider = Mockery::mock(CalendarProvider::class);
        $provider->shouldReceive('refreshAccessToken')
            ->once()
            ->andThrow(new RuntimeException(
                'Failed to refresh the Google access token. Google error: invalid_grant - Token has been expired or revoked.'
            ));

        $resolver = Mockery::mock(CalendarProviderResolver::class);
        $resolver->shouldReceive('resolve')
            ->once()
            ->with($integration->provider)
            ->andReturn($provider);

        $this->app->instance(CalendarProviderResolver::class, $resolver);
        $this->service = app(RefreshIntegrationService::class);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('invalid_grant');

        try {
            $this->service->refresh($integration);
        } finally {
            $integration = $integration->fresh();

            $this->assertFalse($integration->is_active);
            $this->assertFalse($integration->is_primary);

            $this->assertTrue($integration->meta['requires_reconnect']);
            $this->assertSame('invalid_grant', $integration->meta['disconnect_reason']);
            $this->assertNotNull($integration->meta['last_token_refresh_attempt_at'] ?? null);
            $this->assertNotNull($integration->meta['last_token_refresh_failed_at'] ?? null);
            $this->assertStringContainsString(
                'invalid_grant',
                (string) ($integration->meta['last_token_refresh_error'] ?? '')
            );
        }
    }

    public function test_it_keeps_integration_active_on_transient_refresh_failure(): void
    {
        $integration = $this->makeIntegration();

        $provider = Mockery::mock(CalendarProvider::class);
        $provider->shouldReceive('refreshAccessToken')
            ->once()
            ->andThrow(new RuntimeException('Temporary network failure while refreshing token.'));

        $resolver = Mockery::mock(CalendarProviderResolver::class);
        $resolver->shouldReceive('resolve')
            ->once()
            ->with($integration->provider)
            ->andReturn($provider);

        $this->app->instance(CalendarProviderResolver::class, $resolver);
        $this->service = app(RefreshIntegrationService::class);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Temporary network failure');

        try {
            $this->service->refresh($integration);
        } finally {
            $integration = $integration->fresh();

            $this->assertTrue($integration->is_active);
            $this->assertTrue($integration->is_primary);

            $this->assertNotNull($integration->meta['last_token_refresh_attempt_at'] ?? null);
            $this->assertNotNull($integration->meta['last_token_refresh_failed_at'] ?? null);
            $this->assertSame(
                'Temporary network failure while refreshing token.',
                $integration->meta['last_token_refresh_error'] ?? null
            );

            $this->assertArrayNotHasKey('requires_reconnect', $integration->meta ?? []);
            $this->assertArrayNotHasKey('disconnect_reason', $integration->meta ?? []);
        }
    }

    private function makeIntegration(
        bool $isActive = true,
        bool $isPrimary = true,
        ?array $meta = [],
    ): Integration {
        $user = User::factory()->create();

        return Integration::create([
            'user_id' => $user->id,
            'type' => IntegrationType::Calendar,
            'provider' => IntegrationProvider::Google,
            'provider_account_id' => 'google-account-123',
            'email' => 'roman.kocian@gmail.com',
            'name' => 'Roman Kocian',
            'access_token' => 'old-access-token',
            'refresh_token' => 'old-refresh-token',
            'token_expires_at' => now()->subMinute(),
            'scopes' => ['https://www.googleapis.com/auth/calendar'],
            'meta' => $meta,
            'is_active' => $isActive,
            'is_primary' => $isPrimary,
        ]);
    }
}