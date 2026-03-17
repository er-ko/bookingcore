<?php

namespace App\Http\Controllers\Auth\Web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

final class ConnectPageController extends Controller
{
    /**
     * Show the connect page where users can sign in via OAuth providers.
     */
    public function __invoke(): Response
    {
        return Inertia::render('Auth/Connect');
    }
}