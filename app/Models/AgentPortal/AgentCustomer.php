<?php

namespace App\Models\AgentPortal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AgentCustomer extends Model
{
    protected $fillable = [
        'customer_id',
        'first_name',
        'last_name',
		'email',
		'phone',
    ];

    protected $casts = [
        'price' => 'decimal:2',
		'phone' => 'string',
		'email' => 'email',
    ];

    /**
     * Activity associated with the price.
     */
    public function agentPolicies(): HasMany
    {
        return $this->hasMany(AgentPolicy::class);
    }

    /**
     * Unit associated with the price.
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}