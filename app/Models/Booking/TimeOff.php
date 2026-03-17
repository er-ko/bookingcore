<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\CarbonInterface;

class TimeOff extends Model
{
    protected $fillable = [
        'resource_id',
        'starts_at',
        'ends_at',
        'reason',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    /**
     * Resource associated with the time off period.
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