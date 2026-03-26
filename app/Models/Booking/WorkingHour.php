<?php

namespace App\Models\Booking;

use App\Enums\DayOfWeek;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use InvalidArgumentException;

class WorkingHour extends Model
{
    protected $fillable = [
        'unit_id',
        'day_of_week',
        'start_time',
        'end_time',
        'is_active',
    ];

    protected $casts = [
        'day_of_week' => DayOfWeek::class,
        'is_active' => 'boolean',
    ];

    /**
     * Unit associated with the working hour.
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Scope query to a specific unit.
     */
    public function scopeForUnit(Builder $query, int $unitId): Builder
    {
        return $query->where('unit_id', $unitId);
    }

    /**
     * Scope a query by active status.
     */
    public function scopeActive(Builder $query, bool $active = true): Builder
    {
        return $query->where('is_active', $active);
    }

    /**
     * Scope a query by day of week.
     */
    public function scopeDayOfWeek(Builder $query, DayOfWeek|int $dayOfWeek): Builder
    {
        if ($dayOfWeek instanceof DayOfWeek) {
            $dayOfWeek = $dayOfWeek->value;
        }

        if ($dayOfWeek < 1 || $dayOfWeek > 7) {
            throw new InvalidArgumentException(
                __('booking/errors.invalid_day_of_week', ['value' => $dayOfWeek])
            );
        }

        return $query->where('day_of_week', $dayOfWeek);
    }
}