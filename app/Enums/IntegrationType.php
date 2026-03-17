<?php

namespace App\Enums;

enum IntegrationType: string
{
    case Calendar = 'calendar';

    /**
     * Return all enum values.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Determine whether the given value is a valid integration type.
     */
    public static function isValid(string $type): bool
    {
        return in_array($type, self::values(), true);
    }
}