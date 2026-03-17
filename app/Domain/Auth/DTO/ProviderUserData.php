<?php

namespace App\Domain\Auth\DTO;

use Carbon\CarbonImmutable;
use Laravel\Socialite\Contracts\User as ProviderUser;

final class ProviderUserData
{
    /**
     * @param array<int, string>|null $scopes
     * @param array<string, mixed>|null $meta
     */
    public function __construct(
        public readonly string $provider,
        public readonly string $providerUserId,
        public readonly ?string $email,
        public readonly ?string $name,
        public readonly ?string $avatar,
        public readonly ?string $accessToken,
        public readonly ?string $refreshToken,
        public readonly ?CarbonImmutable $tokenExpiresAt,
        public readonly ?array $scopes = null,
        public readonly ?array $meta = null,
    ) {
    }

    /**
     * Create provider user data DTO from a Socialite provider user.
     *
     * @param array<int, string>|null $scopes
     * @param array<string, mixed>|null $meta
     */
    public static function fromSocialite(
        string $provider,
        ProviderUser $providerUser,
        ?array $scopes = null,
        ?array $meta = null,
    ): self {
        $tokenExpiresAt = null;

        if ($providerUser->expiresIn) {
            $tokenExpiresAt = now()
                ->addSeconds($providerUser->expiresIn)
                ->toImmutable();
        }

        return new self(
            provider: $provider,
            providerUserId: (string) $providerUser->getId(),
            email: $providerUser->getEmail(),
            name: $providerUser->getName(),
            avatar: $providerUser->getAvatar(),
            accessToken: $providerUser->token,
            refreshToken: $providerUser->refreshToken,
            tokenExpiresAt: $tokenExpiresAt,
            scopes: $scopes,
            meta: $meta,
        );
    }
}