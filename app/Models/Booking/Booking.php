<?php

namespace App\Models\Booking;

use App\Enums\BookingStatus;
use App\Models\Activity;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Unit;
use App\Models\Integration\BookingCalendarEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use InvalidArgumentException;

class Booking extends Model
{
    protected $fillable = [
        'public_token',
        'branch_id',
        'unit_id',
        'activity_id',
        'customer_id',
        'starts_at',
        'ends_at',
        'status',
        'note',
        'confirmed_at',
        'cancelled_at',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'confirmed_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'status' => BookingStatus::class,
    ];

    /**
     * Branch associated with the booking.
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Unit associated with the booking.
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Activity associated with the booking.
     */
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    /**
     * Customer associated with the booking.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Scope a query by booking status.
     */
    public function scopeStatus(Builder $query, BookingStatus|string $status): Builder
    {
        if (is_string($status)) {
            $status = BookingStatus::tryFrom($status)
                ?? throw new InvalidArgumentException(
                    __('booking/errors.invalid_booking_status', ['value' => $status])
                );
        }

        return $query->where('status', $status->value);
    }

    /**
     * Get all external calendar event mappings for the booking.
     */
    public function calendarEvents(): HasMany
    {
        return $this->hasMany(BookingCalendarEvent::class);
    }
}