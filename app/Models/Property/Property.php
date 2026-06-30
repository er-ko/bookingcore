<?php

namespace App\Models\Property;

use App\Enums\Properties\PropertyType;
use App\Enums\Properties\RentalType;
use App\Models\Region\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Property extends Model
{
    protected $fillable = [
        'user_id',
        'public_id',
        'name',
        'description',
        'rental_type',
        'property_type',
        'address_line_1',
        'address_line_2',
        'city',
        'postcode',
        'country_code',
        'timezone',
        'max_guests',
        'size_sqm',
        'price_per_night',
        'min_nights',
        'check_in_time',
        'check_out_time',
        'cleaning_fee',
        'price_per_month',
        'min_months',
        'deposit_amount',
        'available_from',
        'utilities_included',
        'is_active',
    ];

    protected $casts = [
        'rental_type'        => RentalType::class,
        'property_type'      => PropertyType::class,
        'price_per_night'    => 'decimal:2',
        'cleaning_fee'       => 'decimal:2',
        'price_per_month'    => 'decimal:2',
        'deposit_amount'     => 'decimal:2',
        'available_from'     => 'date',
        'utilities_included' => 'boolean',
        'is_active'          => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Property $property) {
            if (! empty($property->public_id)) {
                return;
            }

            do {
                $publicId = 'pr_' . Str::random(10);
            } while (static::where('public_id', $publicId)->exists());

            $property->public_id = $publicId;
        });
    }

    /**
     * Use public_id for route model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'public_id';
    }

    /**
     * User that owns the property.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Country associated with the property.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_code', 'iso_alpha2');
    }

    /**
     * Scope a query by active status.
     */
    public function scopeActive(Builder $query, bool $active = true): Builder
    {
        return $query->where('is_active', $active);
    }

    /**
     * Scope a query by rental type.
     */
    public function scopeShortTerm(Builder $query): Builder
    {
        return $query->where('rental_type', RentalType::ShortTerm);
    }

    /**
     * Scope a query by rental type.
     */
    public function scopeLongTerm(Builder $query): Builder
    {
        return $query->where('rental_type', RentalType::LongTerm);
    }

    public function isShortTerm(): bool
    {
        return $this->rental_type === RentalType::ShortTerm;
    }

    public function isLongTerm(): bool
    {
        return $this->rental_type === RentalType::LongTerm;
    }
}
