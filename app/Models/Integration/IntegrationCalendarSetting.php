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
        'sync_mode',
    ];

    /**
     * Get the integration that owns the calendar settings.
     */
    public function integration(): BelongsTo
    {
        return $this->belongsTo(Integration::class);
    }

    /**
     * Determine whether strict sync mode is enabled.
     */
    public function isStrictMode(): bool
    {
        return $this->sync_mode === 'strict';
    }

    /**
     * Determine whether soft sync mode is enabled.
     */
    public function isSoftMode(): bool
    {
        return $this->sync_mode === 'soft';
    }
}