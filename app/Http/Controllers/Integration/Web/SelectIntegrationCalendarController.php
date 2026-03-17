<?php

namespace App\Http\Controllers\Integration\Web;

use App\Application\Integration\Actions\SelectIntegrationCalendar;
use App\Http\Controllers\Controller;
use App\Models\Integration\Integration;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class SelectIntegrationCalendarController extends Controller
{
    /**
     * Store the selected calendar for the given integration.
     */
    public function __invoke(
        Request $request,
        Integration $integration,
        SelectIntegrationCalendar $selectIntegrationCalendar,
    ): RedirectResponse {
        $validated = $request->validate([
            'calendar_id' => ['required', 'string', 'max:255'],
        ]);

        /** @var User $user */
        $user = auth()->user();

        $selectIntegrationCalendar(
            $user,
            $integration,
            $validated['calendar_id'],
        );

        return redirect()
            ->route('integrations.calendar.index')
            ->with('success', 'Calendar selected successfully.');
    }
}