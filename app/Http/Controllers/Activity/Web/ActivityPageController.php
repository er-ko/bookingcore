<?php

namespace App\Http\Controllers\Activity\Web;

use App\Application\Activity\Queries\ActivityPageQuery;
use App\Support\Translations\ActivityTranslations;
use App\Http\Controllers\Controller;
use App\Http\Resources\Activity\ActivityResource;
use App\Models\Activity;
use Inertia\Inertia;
use Inertia\Response;

final class ActivityPageController extends Controller
{
    /**
     * Display a listing of activities.
     */
    public function index(ActivityPageQuery $activityPageQuery): Response
    {
        $activities = $activityPageQuery->getList($this->user());

        return Inertia::render('Activity/Index', [
            'activities' => ActivityResource::collection($activities),
            'translations' => ActivityTranslations::index(),
        ]);
    }

    /**
     * Show the activity creation page.
     */
    public function create(): Response
    {
        return Inertia::render('Activity/Create', [
            'translations' => ActivityTranslations::create(),
        ]);
    }

    /**
     * Show the activity edit page.
     */
    public function edit(Activity $activity): Response
    {
        abort_unless($activity->user_id === $this->user()->id, 404);

        return Inertia::render('Activity/Edit', [
            'activity' => ActivityResource::make($activity)->resolve(),
            'translations' => ActivityTranslations::edit(),
        ]);
    }
}