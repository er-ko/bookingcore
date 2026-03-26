<?php

namespace App\Models\Booking;

use App\Models\Activity;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityAssignment extends Model
{
    public const TABLE = 'activity_assignments';

    protected $fillable = [
        'activity_id',
        'unit_id',
    ];

    /**
     * Activity assigned to the unit.
     */
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    /**
     * Unit assigned to the activity.
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}
