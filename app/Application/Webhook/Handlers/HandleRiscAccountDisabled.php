<?php

namespace App\Application\Webhook\Handlers;

use App\Enums\IntegrationProvider;
use App\Models\Auth\ConnectedAccount;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class HandleRiscAccountDisabled
{
    public function __invoke(User $user): void
    {
        // Kill all active sessions and remember-me cookies
        DB::table('sessions')->where('user_id', $user->id)->delete();
        $user->forceFill(['remember_token' => Str::random(60)])->save();

        // Clear auth tokens from connected account
        ConnectedAccount::forProvider('google')
            ->where('user_id', $user->id)
            ->update([
                'access_token' => null,
                'refresh_token' => null,
                'token_expires_at' => null,
            ]);

        // Deactivate all Google integrations, marking them as risc-disabled
        // so account-enabled can selectively restore them
        $user->integrations()
            ->forProvider(IntegrationProvider::Google)
            ->where('is_active', true)
            ->each(function ($integration): void {
                $integration->update([
                    'is_active' => false,
                    'is_primary' => false,
                    'meta' => array_merge($integration->meta ?? [], [
                        'risc_disabled' => true,
                        'risc_disabled_at' => now()->toIso8601String(),
                    ]),
                ]);
            });
    }
}
