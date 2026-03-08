<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    protected $fillable = [
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

    /**
     * Activity assignments for the activity.
     */
    public function activityAssignments(): HasMany
    {
        return $this->hasMany(ActivityAssignment::class);
    }

    /**
     * Resources assigned to the activity.
     */
    public function resources(): BelongsToMany
    {
        return $this->belongsToMany(
            Resource::class,
            ActivityAssignment::TABLE
        )->withTimestamps();
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
