<?php

namespace App\Http\Controllers\Integration\Web;

use App\Application\Integration\Actions\UpdateIntegrationCalendarSettings;
use App\Http\Controllers\Controller;
use App\Models\Integration\Integration;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class UpdateIntegrationCalendarSettingsController extends Controller
{
    /**
     * Update booking calendar sync settings for the given integration.
     */
    public function __invoke(
        Request $request,
        Integration $integration,
        UpdateIntegrationCalendarSettings $updateIntegrationCalendarSettings,
    ): RedirectResponse {
        $validated = $request->validate([
            'sync_bookings' => ['required', 'boolean'],
            'sync_mode' => ['required', 'string', 'in:soft,strict'],
        ]);

        /** @var User $user */
        $user = auth()->user();

        $updateIntegrationCalendarSettings(
            $user,
            $integration,
            (bool) $validated['sync_bookings'],
            $validated['sync_mode'],
        );

        return redirect()
            ->route('integrations.calendar.index')
            ->with('success', 'Calendar sync settings updated successfully.');
    }
}