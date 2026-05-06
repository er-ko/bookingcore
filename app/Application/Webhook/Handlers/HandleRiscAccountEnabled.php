<?php

namespace App\Application\Webhook\Handlers;

use App\Enums\IntegrationProvider;
use App\Models\User;

final class HandleRiscAccountEnabled
{
    public function __invoke(User $user): void
    {
        // Only restore integrations that were explicitly disabled by a RISC event
        $user->integrations()
            ->forProvider(IntegrationProvider::Google)
            ->where('is_active', false)
            ->each(function ($integration): void {
                if (! ($integration->meta['risc_disabled'] ?? false)) {
                    return;
                }

                $meta = $integration->meta ?? [];
                unset($meta['risc_disabled'], $meta['risc_disabled_at']);

                $integration->update([
                    'is_active' => true,
                    'meta' => $meta,
                ]);
            });
    }
}
