<?php

namespace App\Domain\Auth\Actions;

use App\Domain\Auth\DTO\ProviderUserData;
use App\Infrastructure\Auth\Repositories\ConnectedAccountRepository;
use App\Models\User;
use Illuminate\Support\Str;

final class ResolveOAuthUser
{
    public function __construct(
        private ConnectedAccountRepository $accounts,
    ) {
    }

    /**
     * Resolve the local user from provider user data.
     */
    public function __invoke(ProviderUserData $providerUserData): User
    {
        $account = $this->accounts->findByProviderUser(
            $providerUserData->provider,
            $providerUserData->providerUserId
        );

        if ($account) {
            $this->accounts->updateFromProviderData($account, $providerUserData);

            return $account->user;
        }

        $user = null;

        if ($providerUserData->email) {
            $user = User::query()
                ->where('email', $providerUserData->email)
                ->first();
        }

        if (! $user) {
            $user = User::create([
                'name' => $providerUserData->name ?? 'User',
                'email' => $providerUserData->email,
                'password' => Str::random(32),
            ]);
        }

        $this->accounts->create($user, $providerUserData);

        return $user;
    }
} 	