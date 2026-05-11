<?php

namespace App\Application\Adapter\Webhook\DynamicAdapter;

use App\Models\AgentPortal\AgentCustomer;
use App\Models\AgentPortal\AgentPolicy;
use App\Models\User;
use RuntimeException;

final class DynamicAdapter
{
    /**
     * Delete an existing activity for the given user.
     */
    public function __invoke(
        AgentCustomer $agentCustomer,
		AgentPolicy $agentPolicy
    ): array {
        
		return array[
			'llp_customer_id' => $agentCustomer->id,
			'llp_first_name' => $agentCustomer->first_name,
			'llp_last_name' => $agentCustomer->last_name,
		];


    }
}