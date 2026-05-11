<?php

namespace App\Models\AgentPortal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgentPolicy extends Model
{
    protected $fillable = [
        'policy_id',
        'customer_id',
        'expiration_date',
		'prioce',
    ];

    protected $casts = [
        'price' => 'decimal:2',
		'expiration_date' => 'datetime',
    ];

    /**
     * Activity associated with the price.
     */
    public function agentCustomer(): BelongsTo
    {
        return $this->belongsTo(AgentCustomer::class);
    }

    /**
     * Unit associated with the price.
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}