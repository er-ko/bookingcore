<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Get the authenticated user.
     */
    protected function user(): User
    {
        /** @var User $user */
        $user = auth()->user();

        return $user;
    }
}