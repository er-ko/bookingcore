<?php

namespace App\Infrastructure\Integration\Repositories;

use App\Application\Integration\DTO\CalendarAccountData;
use App\Enums\IntegrationProvider;
use App\Enums\IntegrationType;
use App\Models\Integration\Integration;
use App\Models\User;

final class IntegrationRepository
{
    /**
     * Find an integration by user, type, provider and external account identifier.
     */
    public function findByExternalAccount(
        int $userId,
        IntegrationType|string $type,
        IntegrationProvider|string $provider,
        string $providerAccountId,
    ): ?Integration {
        return Integration::query()
            ->where('user_id', $userId)
            ->where('type', $type instanceof IntegrationType ? $type->value : $type)
            ->where('provider', $provider instanceof IntegrationProvider ? $provider->value : $provider)
            ->where('provider_account_id', $providerAccountId)
            ->first();
    }

    /**
     * Find the primary integration for the given user, type and provider.
     */
    public function findPrimary(
        int $userId,
        IntegrationType|string $type,
        IntegrationProvider|string $provider,
    ): ?Integration {
        return Integration::query()
            ->where('user_id', $userId)
            ->where('type', $type instanceof IntegrationType ? $type->value : $type)
            ->where('provider', $provider instanceof IntegrationProvider ? $provider->value : $provider)
            ->primary()
            ->first();
    }

    /**
     * Create a new integration for the given user.
     *
     * @param array<int, string>|null $scopes
     * @param array<string, mixed>|null $meta
     */
    public function create(
        User $user,
        IntegrationType|string $type,
        IntegrationProvider|string $provider,
        CalendarAccountData $accountData,
        ?string $accessToken,
        ?string $refreshToken,
        ?\Carbon\CarbonInterface $tokenExpiresAt,
        ?array $scopes = null,
        ?array $meta = null,
        bool $isActive = true,
        bool $isPrimary = false,
    ): Integration {
        return Integration::create([
            'user_id' => $user->id,
            'type' => $type instanceof IntegrationType ? $type->value : $type,
            'provider' => $provider instanceof IntegrationProvider ? $provider->value : $provider,
            'provider_account_id' => $accountData->providerAccountId,
            'email' => $accountData->email,
            'name' => $accountData->name,
            'access_token' => $accessToken,
            'refresh_token' => $refreshToken,
            'token_expires_at' => $tokenExpiresAt,
            'scopes' => $scopes,
            'meta' => $this->mergeMeta($accountData->meta, $meta),
            'is_active' => $isActive,
            'is_primary' => $isPrimary,
        ]);
    }

    /**
     * Update provider account data and token data for an existing integration.
     *
     * @param array<int, string>|null $scopes
     * @param array<string, mixed>|null $meta
     */
    public function update(
        Integration $integration,
        CalendarAccountData $accountData,
        ?string $accessToken,
        ?string $refreshToken,
        ?\Carbon\CarbonInterface $tokenExpiresAt,
        ?array $scopes = null,
        ?array $meta = null,
        ?bool $isActive = null,
        ?bool $isPrimary = null,
    ): Integration {
        $integration->update([
            'provider_account_id' => $accountData->providerAccountId,
            'email' => $accountData->email,
            'name' => $accountData->name,
            'access_token' => $accessToken,
            'refresh_token' => $refreshToken ?: $integration->refresh_token,
            'token_expires_at' => $tokenExpiresAt,
            'scopes' => $scopes,
            'meta' => $this->mergeMeta($accountData->meta, $meta),
            'is_active' => $isActive ?? $integration->is_active,
            'is_primary' => $isPrimary ?? $integration->is_primary,
        ]);

        return $integration->refresh();
    }

    /**
     * Mark all integrations of the same user and type as non-primary,
     * except the given integration.
     */
    public function unsetOtherPrimaryIntegrations(Integration $integration): void
    {
        Integration::query()
            ->where('user_id', $integration->user_id)
            ->where('type', $integration->type instanceof IntegrationType ? $integration->type->value : $integration->type)
            ->whereKeyNot($integration->id)
            ->update([
                'is_primary' => false,
            ]);
    }

    /**
     * Set the given integration as primary.
     */
    public function setPrimary(Integration $integration): Integration
    {
        $this->unsetOtherPrimaryIntegrations($integration);

        $integration->update([
            'is_primary' => true,
        ]);

        return $integration->refresh();
    }

    /**
     * Deactivate the given integration.
     */
    public function deactivate(Integration $integration): Integration
    {
        $integration->update([
            'is_active' => false,
            'is_primary' => false,
        ]);

        return $integration->refresh();
    }

    /**
     * Merge provider metadata with extra metadata.
     *
     * @param array<string, mixed>|null $accountMeta
     * @param array<string, mixed>|null $extraMeta
     * @return array<string, mixed>|null
     */
    private function mergeMeta(?array $accountMeta, ?array $extraMeta): ?array
    {
        $merged = array_merge($accountMeta ?? [], $extraMeta ?? []);

        return $merged === [] ? null : $merged;
    }
}