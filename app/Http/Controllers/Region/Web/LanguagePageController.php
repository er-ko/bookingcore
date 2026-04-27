<?php

namespace App\Http\Controllers\Region\Web;

use App\Application\Region\Language\Queries\LanguagePageQuery;
use App\Support\Translations\Region\LanguageTranslations;
use App\Http\Controllers\Controller;
use App\Http\Resources\Region\LanguageResource;
use Inertia\Inertia;
use Inertia\Response;

final class LanguagePageController extends Controller
{
    /**
     * Display a listing of languages for the authenticated user.
     */
    public function index(LanguagePageQuery $languagePageQuery): Response
    {
        return Inertia::render('Region/Language/Index', [
            'translations' => LanguageTranslations::index(),
            'languages' => LanguageResource::collection(
                $languagePageQuery->getList($this->user())
            ),
        ]);
    }
}