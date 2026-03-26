<?php

namespace App\Application\Integration\DTO;

final class CalendarAccountData
{
    /**
     * @param array<string, mixed>|null $meta
     */
    public function __construct(
        public readonly string $providerAccountId,
        public readonly ?string $email,
        public readonly ?string $name,
        public readonly ?string $timezone,
        public readonly ?array $meta = null,
    ) {
    }

    /**
     * Convert DTO to a plain array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'provider_account_id' => $this->providerAccountId,
            'email' => $this->email,
            'name' => $this->name,
            'timezone' => $this->timezone,
            'meta' => $this->meta,
        ];
    }
}