<?php

namespace App\Enums;

enum RiscEventType: string
{
    case SessionsRevoked = 'https://schemas.openid.net/secevent/risc/event-type/sessions-revoked';
    case TokenRevoked = 'https://schemas.openid.net/secevent/oauth/event-type/token-revoked';
    case AccountDisabled = 'https://schemas.openid.net/secevent/risc/event-type/account-disabled';
    case AccountEnabled = 'https://schemas.openid.net/secevent/risc/event-type/account-enabled';
    case CredentialChangeRequired = 'https://schemas.openid.net/secevent/risc/event-type/account-credential-change-required';
    case Verification = 'https://schemas.openid.net/secevent/risc/event-type/verification';
}
