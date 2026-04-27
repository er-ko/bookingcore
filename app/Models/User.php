<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\IntegrationProvider;
use App\Enums\IntegrationType;
use App\Models\Auth\ConnectedAccount;
use App\Models\Identity\UserIdentitySettings;
use App\Models\Integration\Integration;
use App\Models\Region\UserRegionSetting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'delete_requested_at',
        'deletion_scheduled_for',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'delete_requested_at' => 'datetime',
            'deletion_scheduled_for' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Determine whether the user has completed required identity settings.
     */
    public function hasCompletedIdentity(): bool
    {
        $identity = $this->identitySettings;

        if (! $identity) {
            return false;
        }

        return filled($identity->brand_name)
            && filled($identity->slug)
            && filled($identity->default_language_code)
            && filled($identity->default_currency_code)
            && filled($identity->default_country_code);
    }

    /**
     * Determine whether the user has completed the required calendar integration step.
     */
    public function hasCompletedCalendarIntegration(): bool
    {
        $integration = $this->primaryCalendarIntegration()->first();

        if (! $integration || ! $integration->is_active) {
            return false;
        }

        $settings = $integration->calendarSettings;

        if (! $settings) {
            return false;
        }

        return is_string($settings->selected_calendar_id)
            && $settings->selected_calendar_id !== '';
    }

    /**
     * Determine whether the user has completed the full onboarding flow.
     */
    public function hasCompletedOnboarding(): bool
    {
        return $this->hasCompletedIdentity()
            && $this->hasCompletedCalendarIntegration();
    }

    /**
     * Get the identity settings assigned to the user.
     */
    public function identitySettings(): HasOne
    {
        return $this->hasOne(UserIdentitySettings::class);
    }

    /**
     * Get the region settings assigned to the user.
     */
    public function regionSettings(): HasOne
    {
        return $this->hasOne(UserRegionSetting::class);
    }

    /**
     * Get the primary active calendar integration for the user.
     */
    public function primaryCalendarIntegration(): HasOne
    {
        return $this->hasOne(Integration::class)
            ->where('type', IntegrationType::Calendar->value)
            ->where('provider', IntegrationProvider::Google->value)
            ->where('is_primary', true)
            ->where('is_active', true);
    }

    /**
     * Get all branches owned by the user.
     */
    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }

    /**
     * Get all units owned by the user.
     */
    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    /**
     * Get all activities owned by the user.
     */
    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }

    /**
     * Get all connected provider accounts for the user.
     */
    public function connectedAccounts(): HasMany
    {
        return $this->hasMany(ConnectedAccount::class);
    }

    /**
     * Get all integrations for the user.
     */
    public function integrations(): HasMany
    {
        return $this->hasMany(Integration::class);
    }

    /**
     * Determine whether the user has a pending account deletion.
     */
    public function hasPendingDeletion(): bool
    {
        return $this->deletion_scheduled_for !== null;
    }

    /**
     * Determine whether the scheduled deletion time has been reached.
     */
    public function isDeletionDue(): bool
    {
        return $this->deletion_scheduled_for !== null
            && $this->deletion_scheduled_for->lte(now());
    }

    /**
     * Schedule account deletion for the given number of days.
     */
    public function scheduleDeletion(int $days = 7): void
    {
        $now = now();

        $this->forceFill([
            'delete_requested_at' => $now,
            'deletion_scheduled_for' => $now->copy()->addDays($days),
        ])->save();
    }

    /**
     * Cancel a previously scheduled account deletion.
     */
    public function cancelDeletion(): void
    {
        $this->forceFill([
            'delete_requested_at' => null,
            'deletion_scheduled_for' => null,
        ])->save();
    }

    /**
     * Get the scheduled deletion datetime instance.
     */
    public function scheduledDeletionAt(): ?Carbon
    {
        return $this->deletion_scheduled_for;
    }
}