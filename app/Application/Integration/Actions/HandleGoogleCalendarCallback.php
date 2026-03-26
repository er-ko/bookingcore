<?php

namespace App\Application\Integration\Actions;

use App\Application\Integration\DTO\CalendarAccountData;
use App\Enums\IntegrationProvider;
use App\Enums\IntegrationType;
use App\Infrastructure\Integration\Repositories\IntegrationRepository;
use App\Models\Integration\Integration;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Contracts\User as ProviderUser;

final class HandleGoogleCalendarCallback
{
    public function __construct(
        private readonly IntegrationRepository $integrations,
    ) {
    }

    /**
     * Handle the Google Calendar OAuth callback for the authenticated user.
     */
    public function __invoke(User $user, ProviderUser $googleUser): Integration
    {
        $tokenExpiresAt = null;

        if ($googleUser->expiresIn) {
            $tokenExpiresAt = CarbonImmutable::now()->addSeconds($googleUser->expiresIn);
        }

        $accountData = new CalendarAccountData(
            providerAccountId: (string) $googleUser->getId(),
            email: $googleUser->getEmail(),
            name: $googleUser->getName(),
            timezone: null,
            meta: [
                'avatar' => $googleUser->getAvatar(),
                'raw' => $googleUser->user,
            ],
        );

        $scopes = $this->extractScopes($googleUser->user);

        return DB::transaction(function () use (
            $user,
            $accountData,
            $googleUser,
            $tokenExpiresAt,
            $scopes,
        ): Integration {
            $integration = $this->integrations->findByExternalAccount(
                userId: $user->id,
                type: IntegrationType::Calendar,
                provider: IntegrationProvider::Google,
                providerAccountId: $accountData->providerAccountId,
            );

            if ($integration) {
                return $this->integrations->update(
                    integration: $integration,
                    accountData: $accountData,
                    accessToken: $googleUser->token,
                    refreshToken: $googleUser->refreshToken,
                    tokenExpiresAt: $tokenExpiresAt,
                    scopes: $scopes,
                    meta: [
                        'connected_via' => 'google_calendar_oauth',
                    ],
                    isActive: true,
                );
            }

            $hasPrimaryIntegration = $this->integrations->findPrimary(
                userId: $user->id,
                type: IntegrationType::Calendar,
                provider: IntegrationProvider::Google,
            );

            $integration = $this->integrations->create(
                user: $user,
                type: IntegrationType::Calendar,
                provider: IntegrationProvider::Google,
                accountData: $accountData,
                accessToken: $googleUser->token,
                refreshToken: $googleUser->refreshToken,
                tokenExpiresAt: $tokenExpiresAt,
                scopes: $scopes,
                meta: [
                    'connected_via' => 'google_calendar_oauth',
                ],
                isActive: true,
                isPrimary: $hasPrimaryIntegration === null,
            );

            if ($integration->is_primary) {
                $this->integrations->setPrimary($integration);
            }

            return $integration;
        });
    }

    /**
     * @param array<string, mixed> $rawUser
     * @return array<int, string>|null
     */
    private function extractScopes(array $rawUser): ?array
    {
        if (! isset($rawUser['scope']) || ! is_string($rawUser['scope'])) {
            return null;
        }

        $scopes = preg_split('/\s+/', trim($rawUser['scope'])) ?: [];

        return $scopes === [] ? null : array_values(array_filter($scopes));
    }
}