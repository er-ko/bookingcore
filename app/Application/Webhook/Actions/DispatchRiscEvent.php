<?php

namespace App\Application\Webhook\Actions;

use App\Application\Webhook\Handlers\HandleRiscAccountDisabled;
use App\Application\Webhook\Handlers\HandleRiscAccountEnabled;
use App\Application\Webhook\Handlers\HandleRiscCredentialChangeRequired;
use App\Application\Webhook\Handlers\HandleRiscSessionsRevoked;
use App\Application\Webhook\Handlers\HandleRiscTokenRevoked;
use App\Enums\RiscEventType;
use stdClass;

final class DispatchRiscEvent
{
    public function __construct(
        private readonly ResolveRiscSubject $resolveSubject,
        private readonly HandleRiscSessionsRevoked $handleSessionsRevoked,
        private readonly HandleRiscTokenRevoked $handleTokenRevoked,
        private readonly HandleRiscAccountDisabled $handleAccountDisabled,
        private readonly HandleRiscAccountEnabled $handleAccountEnabled,
        private readonly HandleRiscCredentialChangeRequired $handleCredentialChangeRequired,
    ) {
    }

    public function __invoke(stdClass $payload): void
    {
        $events = get_object_vars($payload->events ?? new stdClass());

        if ($events === []) {
            return;
        }

        // Verification events carry no subject — just acknowledge them
        if (isset($events[RiscEventType::Verification->value])) {
            return;
        }

        $user = ($this->resolveSubject)($payload);

        if ($user === null) {
            return;
        }

        foreach ($events as $eventType => $eventPayload) {
            $type = RiscEventType::tryFrom($eventType);

            match ($type) {
                RiscEventType::SessionsRevoked => ($this->handleSessionsRevoked)($user),
                RiscEventType::TokenRevoked => ($this->handleTokenRevoked)($user),
                RiscEventType::AccountDisabled => ($this->handleAccountDisabled)($user),
                RiscEventType::AccountEnabled => ($this->handleAccountEnabled)($user),
                RiscEventType::CredentialChangeRequired => ($this->handleCredentialChangeRequired)($user),
                default => null,
            };
        }
    }
}
