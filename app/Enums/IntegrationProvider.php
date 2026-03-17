<?php

namespace App\Enums;

enum IntegrationProvider: string
{
    case Google = 'google';
    case Microsoft = 'microsoft';
    case Apple = 'apple';

    /**
     * Return all enum values.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Determine whether the given provider is valid.
     */
    public static function isValid(string $provider): bool
    {
        return in_array($provider, self::values(), true);
    }

    /**
     * Determine whether the provider supports OAuth.
     */
    public function supportsOAuth(): bool
    {
        return match ($this) {
            self::Google,
            self::Microsoft => true,
            self::Apple => false,
        };
    }

    /**
     * Return display name of provider.
     */
    public function label(): string
    {
        return match ($this) {
            self::Google => 'Google',
            self::Microsoft => 'Microsoft',
            self::Apple => 'Apple',
        };
    }
}