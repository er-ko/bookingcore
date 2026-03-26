<?php

namespace App\Models\Region;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Timezone extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * This model represents static reference data and is not intended
     * to be created or modified via mass assignment from user input.
     */
    protected $guarded = ['id'];

    protected $casts = [
        'latitude'   => 'float',
        'longitude'  => 'float',
        'sort_order' => 'integer',
    ];

    /**
     * Available countries for the timezone.
     */
    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, 'country_timezone', 'timezone_id', 'country_id');
    }

    /**
     * Scope a query ordered by timezone name.
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query
            ->orderBy('sort_order')
            ->orderBy('name');
    }
}