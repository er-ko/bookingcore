<?php

namespace App\Http\Controllers\Integration\Web;

use App\Application\Integration\Actions\SelectIntegrationCalendar;
use App\Http\Controllers\Controller;
use App\Http\Requests\Integration\SelectIntegrationCalendarRequest;
use App\Models\Integration\Integration;
use Illuminate\Http\RedirectResponse;
use RuntimeException;

final class SelectIntegrationCalendarController extends Controller
{
    /**
     * Store the selected calendar for the given integration.
     */
    public function __invoke(
        SelectIntegrationCalendarRequest $request,
        Integration $integration,
        SelectIntegrationCalendar $selectIntegrationCalendar,
    ): RedirectResponse {
        try {
            $selectIntegrationCalendar(
                $this->user(),
                $integration,
                $request->validated('calendar_id'),
            );
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('integrations.calendar.index')
                ->with('error', $exception->getMessage() ?: __('integration/calendar.messages.failed'));
        }

        return redirect()
            ->route('integrations.calendar.index')
            ->with('success', __('integration/calendar.messages.calendar_selected'));
    }
}
