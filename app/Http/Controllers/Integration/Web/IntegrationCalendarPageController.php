<?php

namespace App\Http\Controllers\Integration\Web;

use App\Application\Integration\Queries\IntegrationCalendarQuery;
use App\Support\Translations\Integration\CalendarTranslations;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

final class IntegrationCalendarPageController extends Controller
{
    /**
     * Show the calendar integrations page for the authenticated user.
     */
    public function __invoke(IntegrationCalendarQuery $integrationCalendarQuery): Response
    {
        return Inertia::render('Integration/Calendars', [
            'translations' => CalendarTranslations::index(),
            'calendarIntegration' => $integrationCalendarQuery($this->user()),
        ]);
    }
}