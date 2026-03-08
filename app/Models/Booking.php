<?php

namespace App\Models;

use App\Enums\BookingStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use InvalidArgumentException;

class Booking extends Model
{
    protected $fillable = [
        'branch_id',
        'resource_id',
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
     * Resource associated with the booking.
     */
    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
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
}