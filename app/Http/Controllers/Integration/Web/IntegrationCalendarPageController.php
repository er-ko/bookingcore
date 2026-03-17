<?php

namespace App\Http\Controllers\Integration\Web;

use App\Application\Integration\Queries\IntegrationCalendarQuery;
use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

final class IntegrationCalendarPageController extends Controller
{
    /**
     * Show the calendar integrations page for the authenticated user.
     */
    public function __invoke(IntegrationCalendarQuery $integrationCalendarQuery): Response
    {
        /** @var User $user */
        $user = auth()->user();

        return Inertia::render('Integration/Calendars', [
            'calendarIntegration' => $integrationCalendarQuery($user),
        ]);
    }
}