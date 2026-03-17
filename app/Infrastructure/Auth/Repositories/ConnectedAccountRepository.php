<?php

namespace App\Infrastructure\Auth\Repositories;

use App\Domain\Auth\DTO\ProviderUserData;
use App\Models\Auth\ConnectedAccount;
use App\Models\User;

final class ConnectedAccountRepository
{
    /**
     * Find a connected account by provider and provider user identifier.
     */
    public function findByProviderUser(
        string $provider,
        string $providerUserId,
    ): ?ConnectedAccount {
        return ConnectedAccount::query()
            ->forProviderUser($provider, $providerUserId)
            ->first();
    }

    /**
     * Find a connected account for the given user and provider.
     */
    public function findByUserAndProvider(
        int $userId,
        string $provider,
    ): ?ConnectedAccount {
        return ConnectedAccount::query()
            ->where('user_id', $userId)
            ->forProvider($provider)
            ->first();
    }

    /**
     * Create a new connected account for the given user.
     */
    public function create(User $user, ProviderUserData $providerUserData): ConnectedAccount
    {
        return ConnectedAccount::create([
            'user_id' => $user->id,
            'provider' => $providerUserData->provider,
            'provider_user_id' => $providerUserData->providerUserId,
            'provider_email' => $providerUserData->email,
            'provider_name' => $providerUserData->name,
            'avatar' => $providerUserData->avatar,
            'access_token' => $providerUserData->accessToken,
            'refresh_token' => $providerUserData->refreshToken,
            'token_expires_at' => $providerUserData->tokenExpiresAt,
            'scopes' => $providerUserData->scopes,
            'meta' => $providerUserData->meta,
        ]);
    }

    /**
     * Update provider data and tokens for an existing connected account.
     */
    public function updateFromProviderData(
        ConnectedAccount $connectedAccount,
        ProviderUserData $providerUserData,
    ): ConnectedAccount {
        $connectedAccount->update([
            'provider_email' => $providerUserData->email,
            'provider_name' => $providerUserData->name,
            'avatar' => $providerUserData->avatar,
            'access_token' => $providerUserData->accessToken,
            'refresh_token' => $providerUserData->refreshToken ?: $connectedAccount->refresh_token,
            'token_expires_at' => $providerUserData->tokenExpiresAt,
            'scopes' => $providerUserData->scopes,
            'meta' => $providerUserData->meta,
        ]);

        return $connectedAccount->refresh();
    }
}