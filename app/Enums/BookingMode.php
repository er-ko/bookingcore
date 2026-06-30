<?php

namespace App\Enums;

/**
 * Represents the supported operating modes of a BookingCore workspace.
 *
 * Each mode defines the primary booking logic the workspace is built around,
 * such as standard service reservations, parking, or rental-based scenarios.
 */
enum BookingMode: string
{
    /**
     * Standard service-based reservations.
     *
     * Example:
     * - hair salons
     * - massage studios
     * - consultations
     */
    case Services = 'services';

    /**
     * Parking reservation flow.
     *
     * Example:
     * - airport parking
     * - private parking lots
     * - garage space booking
     */
    case Parking = 'parking';

    /**
     * Boat rental booking flow.
     */
    case BoatRental = 'boat_rental';

    /**
     * Car rental booking flow.
     */
    case CarRental = 'car_rental';

    /**
     * Caravan or camper rental booking flow.
     */
    case CaravanRental = 'caravan_rental';

    /**
     * Property rental booking flow.
     *
     * Example:
     * - apartments
     * - holiday homes
     * - short-term stays
     */
    case Properties = 'properties';

    /**
     * Get all enum values as a plain string list.
     *
     * Useful for validation rules, select inputs, and comparisons
     * where scalar values are required.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function label(): string
    {
        return __("enums.booking_mode.{$this->value}.label");
    }

    public function description(): string
    {
        return __("enums.booking_mode.{$this->value}.description");
    }

    public function isAvailable(): bool
    {
        return match ($this) {
            self::Services      => true,
            self::Properties    => false,
            default             => false,
        };
    }

    public static function options(): array
    {
        $options = array_map(fn($case) => [
            'value'       => $case->value,
            'label'       => $case->label(),
            'description' => $case->description(),
            'available'   => $case->isAvailable(),
        ], self::cases());

        usort($options, fn($a, $b) =>
            $b['available'] <=> $a['available']
            ?: strcasecmp($a['label'], $b['label'])
        );

        return $options;
    }

}