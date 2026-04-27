<?php

namespace App\Models;

use App\Models\Booking\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Activity extends Model
{
    protected $fillable = [
        'user_id',
        'public_id',
        'name',
        'duration_minutes',
        'buffer_before_minutes',
        'buffer_after_minutes',
        'is_active',
    ];

    protected $casts = [
        'duration_minutes' => 'integer',
        'buffer_before_minutes' => 'integer',
        'buffer_after_minutes' => 'integer',
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Activity $activity) {
            if (! empty($activity->public_id)) {
                return;
            }

            do {
                $publicId = 'ac_' . Str::random(10);
            } while (static::where('public_id', $publicId)->exists());

            $activity->public_id = $publicId;
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
     * User that owns the activity.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Activity prices for the activity.
     */
    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }

    /**
     * Units assigned to the activity.
     */
    public function units(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'prices', 'activity_id', 'unit_id')
            ->withPivot('id', 'price')
            ->withTimestamps();
    }

    /**
     * Bookings associated with the activity.
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
}
