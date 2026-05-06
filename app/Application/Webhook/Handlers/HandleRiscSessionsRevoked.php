<?php

namespace App\Application\Webhook\Handlers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class HandleRiscSessionsRevoked
{
    public function __invoke(User $user): void
    {
        DB::table('sessions')->where('user_id', $user->id)->delete();

        $user->forceFill(['remember_token' => Str::random(60)])->save();
    }
}
