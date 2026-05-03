<?php

namespace App\Http\Controllers\Dashboard\Web;

use App\Application\Booking\Queries\BookingPageQuery;
use App\Support\Translations\DashboardTranslations;
use App\Http\Controllers\Controller;
use App\Http\Resources\Booking\BookingResource;
use App\Models\Identity\UserIdentitySettings;
use Inertia\Inertia;
use Inertia\Response;

final class DashboardPageController extends Controller
{
    /**
     * Display the dashboard page.
     */
    public function index(BookingPageQuery $bookingPageQuery): Response
    {
        $bookings = $bookingPageQuery->getList($this->user());

        $identity = UserIdentitySettings::query()
            ->where('user_id', $this->user()->id)
            ->first();

        return Inertia::render('Dashboard/Index', [
            'translations' => DashboardTranslations::index(),
            'bookings' => BookingResource::collection($bookings),
            'identity' => $identity,
        ]);
    }
}