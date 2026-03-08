<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resource extends Model
{
    protected $fillable = [
        'branch_id',
        'name',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Branch to which the resource belongs.
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Activity assignments for the resource.
     */
    public function activityAssignments(): HasMany
    {
        return $this->hasMany(ActivityAssignment::class);
    }

    /**
     * Activities assigned to the resource.
     */
    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(
            Activity::class,
            ActivityAssignment::TABLE
        )->withTimestamps();
    }

    /**
     * Bookings assigned to the resource.
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Working hours assigned to the resource.
     */
    public function workingHours(): HasMany
    {
        return $this->hasMany(WorkingHour::class);
    }

    /**
     * Time off periods assigned to the resource.
     */
    public function timeOffs(): HasMany
    {
        return $this->hasMany(TimeOff::class);
    }

    /**
     * Recurring time-off periods assigned to the resource.
     */
    public function recurringTimeOffs(): HasMany
    {
        return $this->hasMany(RecurringTimeOff::class);
    }

    /**
     * Scope a query by active status.
     */
    public function scopeActive(Builder $query, bool $active = true): Builder
    {
        return $query->where('is_active', $active);
    }
}