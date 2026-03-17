<?php

namespace App\Models\Integration;

use App\Enums\IntegrationProvider;
use App\Models\Booking\Booking;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class BookingCalendarEvent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'booking_id',
        'integration_id',
        'provider',
        'calendar_id',
        'provider_event_id',
        'status',
        'synced_at',
        'last_error',
        'last_error_at',
        'meta',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'synced_at' => 'datetime',
            'last_error_at' => 'datetime',
            'meta' => 'array',
        ];
    }

    /**
     * Get the booking that owns the external calendar event mapping.
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Get the integration used for this external calendar event mapping.
     */
    public function integration(): BelongsTo
    {
        return $this->belongsTo(Integration::class);
    }

    /**
     * Scope query by provider.
     */
    public function scopeForProvider(Builder $query, IntegrationProvider|string $provider): Builder
    {
        return $query->where('provider', $provider instanceof IntegrationProvider ? $provider->value : $provider);
    }

    /**
     * Scope query by sync status.
     */
    public function scopeForStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    /**
     * Determine whether the event mapping is currently synced.
     */
    public function isSynced(): bool
    {
        return $this->status === 'synced';
    }

    /**
     * Determine whether the event mapping is marked as deleted.
     */
    public function isDeleted(): bool
    {
        return $this->status === 'deleted';
    }

    /**
     * Determine whether the event mapping is marked as failed.
     */
    public function hasFailed(): bool
    {
        return $this->status === 'failed';
    }
}