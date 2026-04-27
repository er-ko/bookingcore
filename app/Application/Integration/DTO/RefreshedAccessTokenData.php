<?php

namespace App\Application\Integration\DTO;

use Carbon\CarbonInterface;

final readonly class RefreshedAccessTokenData
{
    public function __construct(
        public string $accessToken,
        public ?string $refreshToken,
        public ?CarbonInterface $tokenExpiresAt,
    ) {
    }

    /**
     * Convert the DTO to an array representation.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'access_token' => $this->accessToken,
            'refresh_token' => $this->refreshToken,
            'token_expires_at' => $this->tokenExpiresAt,
        ];
    }
}