<?php

namespace App\Models;

use App\Models\Booking\Booking;
use App\Models\Region\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Branch extends Model
{
    protected $fillable = [
        'user_id',
        'public_id',
        'name',
        'address_line_1',
        'address_line_2',
        'city',
        'postcode',
        'country_code',
        'timezone',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Branch $branch) {
            if (! empty($branch->public_id)) {
                return;
            }

            do {
                $publicId = 'br_' . Str::random(10);
            } while (static::where('public_id', $publicId)->exists());

            $branch->public_id = $publicId;
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
     * User that owns the branch.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Units assigned to the branch.
     */
    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    /**
     * Bookings associated with the branch.
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Scope a query by active status.
     */
    public function scopeActive(Builder $query, bool $active = true): Builder
    {
        return $query->where('is_active', $active);
    }

    /**
     * Country associated with the branch.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_code', 'iso_alpha2');
    }
}