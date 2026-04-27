<?php

namespace App\Models\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class ConnectedAccount extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'provider',
        'provider_user_id',
        'provider_email',
        'provider_name',
        'avatar',
        'access_token',
        'refresh_token',
        'token_expires_at',
        'scopes',
        'meta',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'access_token' => 'encrypted',
            'refresh_token' => 'encrypted',
            'token_expires_at' => 'datetime',
            'scopes' => 'array',
            'meta' => 'array',
        ];
    }

    /**
     * Get the local user that owns the connected account.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope query by provider name.
     */
    public function scopeForProvider(Builder $query, string $provider): Builder
    {
        return $query->where('provider', $provider);
    }

    /**
     * Scope query by provider user identifier.
     */
    public function scopeForProviderUser(Builder $query, string $provider, string $providerUserId): Builder
    {
        return $query
            ->where('provider', $provider)
            ->where('provider_user_id', $providerUserId);
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
     * Determine whether the connected account has a refresh token.
     */
    public function hasRefreshToken(): bool
    {
        return filled($this->refresh_token);
    }

    /**
     * Determine whether the connected account includes the given scope.
     */
    public function hasScope(string $scope): bool
    {
        return in_array($scope, $this->scopes ?? [], true);
    }
}