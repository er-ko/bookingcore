<?php

namespace App\Models\Integration;

use App\Enums\IntegrationType;
use App\Enums\IntegrationProvider;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class Integration extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'type',
        'provider',
        'provider_account_id',
        'email',
        'name',
        'access_token',
        'refresh_token',
        'token_expires_at',
        'scopes',
        'meta',
        'is_active',
        'is_primary',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => IntegrationType::class,
            'provider' => IntegrationProvider::class,
            'access_token' => 'encrypted',
            'refresh_token' => 'encrypted',
            'token_expires_at' => 'immutable_datetime',
            'scopes' => 'array',
            'meta' => 'array',
            'is_active' => 'boolean',
            'is_primary' => 'boolean',
        ];
    }

    /**
     * Get the user that owns the integration.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope query by integration type.
     */
    public function scopeForType(Builder $query, IntegrationType|string $type): Builder
    {
        return $query->where('type', $type instanceof IntegrationType ? $type->value : $type);
    }

    /**
     * Scope query by provider.
     */
    public function scopeForProvider(Builder $query, IntegrationProvider|string $provider): Builder
    {
        return $query->where('provider', $provider instanceof IntegrationProvider ? $provider->value : $provider);
    }

    /**
     * Scope query by active state.
     */
    public function scopeActive(Builder $query, bool $active = true): Builder
    {
        return $query->where('is_active', $active);
    }

    /**
     * Scope query by primary state.
     */
    public function scopePrimary(Builder $query, bool $primary = true): Builder
    {
        return $query->where('is_primary', $primary);
    }

    /**
     * Determine whether the access token has expired.
     */
    public function tokenExpired(): bool
    {
        if (! $this->token_expires_at) {
            return false;
        }

        return $this->token_expires_at->isPast();
    }

    /**
     * Determine whether the integration has a refresh token.
     */
    public function hasRefreshToken(): bool
    {
        return filled($this->refresh_token);
    }

    /**
     * Determine whether the integration has the given scope.
     */
    public function hasScope(string $scope): bool
    {
        return in_array($scope, $this->scopes ?? [], true);
    }

    /**
     * Get calendar-specific settings for this integration.
     */
    public function calendarSettings(): HasOne
    {
        return $this->hasOne(IntegrationCalendarSetting::class);
    }

    /**
     * Get all booking calendar events linked to this integration.
     */
    public function bookingCalendarEvents(): HasMany
    {
        return $this->hasMany(BookingCalendarEvent::class);
    }
}