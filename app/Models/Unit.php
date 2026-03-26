<?php

namespace App\Models;

use App\Models\Activity;
use App\Models\Booking\ActivityAssignment;
use App\Models\Booking\Booking;
use App\Models\Booking\RecurringTimeOff;
use App\Models\Booking\TimeOff;
use App\Models\Booking\WorkingHour;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Unit extends Model
{
    protected $fillable = [
        'user_id',
        'public_id',
        'branch_id',
        'name',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Unit $unit) {
            if (! empty($unit->public_id)) {
                return;
            }

            do {
                $publicId = 'un_' . Str::random(10);
            } while (static::where('public_id', $publicId)->exists());

            $unit->public_id = $publicId;
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
     * User that owns the unit.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Branch to which the unit belongs.
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Activity assignments for the unit.
     */
    public function activityAssignments(): HasMany
    {
        return $this->hasMany(ActivityAssignment::class);
    }

    /**
     * Activities assigned to the unit.
     */
    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, ActivityAssignment::TABLE)->withTimestamps();
    }

    /**
     * Bookings assigned to the unit.
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Working hours assigned to the unit.
     */
    public function workingHours(): HasMany
    {
        return $this->hasMany(WorkingHour::class);
    }

    /**
     * Time off periods assigned to the unit.
     */
    public function timeOffs(): HasMany
    {
        return $this->hasMany(TimeOff::class);
    }

    /**
     * Recurring time-off periods assigned to the unit.
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