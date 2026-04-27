<?php

namespace App\Models\Region;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * This model represents static reference data and is not intended
     * to be created or modified via mass assignment from user input.
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Timezones available for the country.
     */
    public function timezones(): BelongsToMany
    {
        return $this->belongsToMany(Timezone::class, 'country_timezone', 'country_id', 'timezone_id');
    }

    /**
     * Branches assigned to the country.
     */
    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class, 'country_code', 'iso_alpha2');
    }

    /**
     * Get the ISO 3166-1 alpha-2 country code.
     *
     * Provides a convenient alias for the iso_alpha2 attribute.
     */
    public function getCodeAttribute(): string
    {
        return $this->iso_alpha2;
    }

    /**
     * Scope a query by active status.
     */
    public function scopeActive(Builder $query, bool $active = true): Builder
    {
        return $query->where('is_active', $active);
    }
}