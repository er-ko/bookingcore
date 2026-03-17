<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityAssignment extends Model
{
    public const TABLE = 'activity_assignments';

    protected $fillable = [
        'activity_id',
        'resource_id',
    ];

    /**
     * Activity assigned to the resource.
     */
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    /**
     * Resource assigned to the activity.
     */
    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }
}
