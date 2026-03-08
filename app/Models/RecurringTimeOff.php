<?php

namespace App\Models;

use App\Enums\DayOfWeek;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use InvalidArgumentException;

class RecurringTimeOff extends Model
{
    protected $fillable = [
        'resource_id',
        'day_of_week',
        'start_time',
        'end_time',
        'reason',
        'is_active',
        'valid_from',
        'valid_until',
    ];

    protected $casts = [
        'day_of_week' => DayOfWeek::class,
        'is_active' => 'boolean',
        'valid_from' => 'date',
        'valid_until' => 'date',
    ];

    /**
     * Resource associated with the recurring time-off.
     */
    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }

    /**
     * Scope query to a specific resource.
     */
    public function scopeForResource(Builder $query, int $resourceId): Builder
    {
        return $query->where('resource_id', $resourceId);
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

    /**
     * Scope a query to recurring time-offs that are valid for the given date.
     *
     * A record is considered valid when:
     * - valid_from is null or earlier than/equal to the given date
     * - valid_until is null or later than/equal to the given date
     */
    public function scopeValidForDate(Builder $query, string $date): Builder
    {
        return $query
            ->where(function (Builder $builder) use ($date) {
                $builder->whereNull('valid_from')
                    ->orWhere('valid_from', '<=', $date);
            })
            ->where(function (Builder $builder) use ($date) {
                $builder->whereNull('valid_until')
                    ->orWhere('valid_until', '>=', $date);
            });
    }
}