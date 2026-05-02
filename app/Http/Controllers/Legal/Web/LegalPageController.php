<?php

namespace App\Http\Controllers\Legal\Web;

use App\Http\Controllers\Controller;
use App\Support\LegalDocuments;
use Inertia\Inertia;
use Inertia\Response;

final class LegalPageController extends Controller
{
    public function privacyPolicy(): Response
    {
        return Inertia::render('Legal/Show', [
            'document' => LegalDocuments::privacyPolicy(),
        ]);
    }

    public function termsOfService(): Response
    {
        return Inertia::render('Legal/Show', [
            'document' => LegalDocuments::termsOfService(),
        ]);
    }
}
