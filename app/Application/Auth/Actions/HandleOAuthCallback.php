<?php

namespace App\Application\Auth\Actions;

use App\Domain\Auth\Actions\ResolveOAuthUser;
use App\Domain\Auth\DTO\ProviderUserData;
use App\Models\User;
use Laravel\Socialite\Contracts\Factory as SocialiteFactory;

final class HandleOAuthCallback
{
    public function __construct(
        private readonly SocialiteFactory $socialite,
        private readonly ResolveOAuthUser $resolveOAuthUser,
    ) {
    }

    /**
     * Handle the OAuth callback for the given provider.
     */
    public function __invoke(
        string $provider
    ): User {
        $providerUser = $this->socialite->driver($provider)->user();

        $providerUserData = ProviderUserData::fromSocialite(
            provider: $provider,
            providerUser: $providerUser,
            meta: [
                'raw' => $providerUser->user,
            ],
        );

        return ($this->resolveOAuthUser)($providerUserData);
    }
}