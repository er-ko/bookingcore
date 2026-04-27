<?php

namespace App\Models\Region;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class UserRegionSetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'active_country_codes',
        'active_language_codes',
        'active_currency_codes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'active_country_codes' => 'array',
        'active_language_codes' => 'array',
        'active_currency_codes' => 'array',
    ];

    /**
     * Get the user that owns the region settings.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}