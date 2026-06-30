<?php

namespace App\Enums\Properties;

enum PropertyType: string
{
    case Apartment = 'apartment';
    case House     = 'house';
    case Room      = 'room';
    case Garage    = 'garage';
    case Garden    = 'garden';
    case Parking   = 'parking';
    case Other     = 'other';

    public function label(): string
    {
        return __("enums.property_type.{$this->value}.label");
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
