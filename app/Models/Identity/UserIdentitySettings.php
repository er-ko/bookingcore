<?php

namespace App\Models\Identity;

use App\Enums\BookingMode;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class UserIdentitySettings extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'mode',
        'brand_name',
        'slug',
        'default_language_code',
        'default_currency_code',
        'default_country_code',
        'is_public',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'mode' => BookingMode::class,
        'is_public' => 'boolean',
    ];

    /**
     * Get the user that owns these identity settings.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Determine whether the booking workspace is configured for the services mode.
     */
    public function isServicesMode(): bool
    {
        return $this->mode === BookingMode::Services;
    }
}