<?php

namespace App\Http\Controllers\Legal\Web;

use App\Http\Controllers\Controller;
use App\Support\Translations\Legal\PrivacyPolicyTranslations;
use App\Support\Translations\Legal\TermsOfServiceTranslations;
use Inertia\Inertia;
use Inertia\Response;

final class LegalPageController extends Controller
{
    public function privacyPolicy(): Response
    {
        return Inertia::render('Legal/Show', [
            'document' => PrivacyPolicyTranslations::page(),
        ]);
    }

    public function termsOfService(): Response
    {
        return Inertia::render('Legal/Show', [
            'document' => TermsOfServiceTranslations::page(),
        ]);
    }
}
