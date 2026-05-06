<?php

namespace App\Application\Webhook\Actions;

use App\Models\Auth\ConnectedAccount;
use App\Models\User;
use stdClass;

final class ResolveRiscSubject
{
    /**
     * Resolve the local User from a RISC JWT payload.
     *
     * Handles both the modern sub_id claim and the legacy sub claim.
     */
    public function __invoke(stdClass $payload): ?User
    {
        $googleUserId = $this->extractGoogleUserId($payload);

        if ($googleUserId === null) {
            return null;
        }

        $account = ConnectedAccount::forProviderUser('google', $googleUserId)
            ->with('user')
            ->first();

        return $account?->user;
    }

    private function extractGoogleUserId(stdClass $payload): ?string
    {
        // Modern format: sub_id.sub
        if (isset($payload->sub_id) && is_object($payload->sub_id)) {
            $subId = $payload->sub_id;

            if (
                isset($subId->format, $subId->sub)
                && $subId->format === 'iss_sub'
                && is_string($subId->sub)
            ) {
                return $subId->sub;
            }
        }

        // Legacy format: sub directly on the payload
        if (isset($payload->sub) && is_string($payload->sub)) {
            return $payload->sub;
        }

        return null;
    }
}
