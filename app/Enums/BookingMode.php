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
    case PropertyRental = 'property_rental';

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
}