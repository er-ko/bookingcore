<?php

namespace App\Http\Controllers\Identity\Web;

use App\Application\Identity\Queries\IdentityPageQuery;
use App\Support\Translations\IdentityTranslations;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

final class IdentityPageController extends Controller
{
    /**
     * Display the identity settings page.
     */
    public function __invoke(IdentityPageQuery $identityPageQuery): Response
    {
        return Inertia::render('Identity/Index',[
            'translations' => IdentityTranslations::index(),
            ...$identityPageQuery->get($this->user()),
        ]);
    }
}