<?php

namespace App\Application\Webhook\Handlers;

use App\Enums\IntegrationProvider;
use App\Models\Auth\ConnectedAccount;
use App\Models\User;

final class HandleRiscTokenRevoked
{
    public function __invoke(User $user): void
    {
        ConnectedAccount::forProvider('google')
            ->where('user_id', $user->id)
            ->update([
                'access_token' => null,
                'refresh_token' => null,
                'token_expires_at' => null,
            ]);

        $user->integrations()
            ->forProvider(IntegrationProvider::Google)
            ->update([
                'is_active' => false,
                'is_primary' => false,
                'access_token' => null,
                'refresh_token' => null,
                'token_expires_at' => null,
            ]);
    }
}
