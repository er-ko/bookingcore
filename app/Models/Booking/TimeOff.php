<?php

namespace App\Models\Booking;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\CarbonInterface;

class TimeOff extends Model
{
    protected $fillable = [
        'unit_id',
        'starts_at',
        'ends_at',
        'reason',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    /**
     * Unit associated with the time off period.
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
     * Scope query for time offs overlapping a given time range.
     * Uses interval overlap logic.
     */
    public function scopeBetween(Builder $query, CarbonInterface $start, CarbonInterface $end): Builder
    {
        return $query->where(function (Builder $inner) use ($start, $end) {
            $inner->where('starts_at', '<', $end)
                ->where('ends_at', '>', $start);
        });
    }
}