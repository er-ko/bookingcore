<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class IntegrationCalendarSetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'integration_id',
        'selected_calendar_id',
    ];

    /**
     * Get the integration that owns the calendar settings.
     */
    public function integration(): BelongsTo
    {
        return $this->belongsTo(Integration::class);
    }
}