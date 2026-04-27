<?php

namespace App\Http\Controllers\Integration\Web;

use App\Application\Integration\Actions\UpdateIntegrationCalendarSettings;
use App\Http\Controllers\Controller;
use App\Http\Requests\Integration\UpdateIntegrationCalendarSettingsRequest;
use App\Models\Integration\Integration;
use Illuminate\Http\RedirectResponse;
use RuntimeException;

final class UpdateIntegrationCalendarSettingsController extends Controller
{
    /**
     * Update booking calendar settings for the given integration.
     */
    public function __invoke(
        UpdateIntegrationCalendarSettingsRequest $request,
        Integration $integration,
        UpdateIntegrationCalendarSettings $updateIntegrationCalendarSettings,
    ): RedirectResponse {
        try {
            $updateIntegrationCalendarSettings(
                $this->user(),
                $integration,
                $request->validated('sync_mode'),
            );
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('integrations.calendar.index')
                ->with('error', $exception->getMessage() ?: __('integration/calendar.messages.failed'));
        }

        return redirect()
            ->route('integrations.calendar.index')
            ->with('success', __('integration/calendar.messages.settings_updated'));
    }
}
