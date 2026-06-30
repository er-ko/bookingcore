<?php

namespace App\Enums\Properties;

enum RentalType: string
{
    case ShortTerm = 'short_term';
    case LongTerm  = 'long_term';

    public function label(): string
    {
        return __("enums.rental_type.{$this->value}.label");
    }

    public function description(): string
    {
        return __("enums.rental_type.{$this->value}.description");
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
