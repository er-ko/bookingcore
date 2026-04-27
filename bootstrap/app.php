<?php

use App\Domain\Booking\Exceptions\BookingException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->group(base_path('routes/auth.php'));

            Route::middleware('web')
                ->group(base_path('routes/integrations.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(fn () => route('connect.index'));

        $middleware->web(append: [
            \App\Http\Middleware\HandleInertiaRequests::class,
        ]);

        $middleware->alias([
            'onboarding.completed' => \App\Http\Middleware\EnsureOnboardingIsCompleted::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $renderJsonException = static function (
            \Throwable $exception,
            Request $request,
            int $status = 422
        ): ?JsonResponse {
            if (! $request->expectsJson()) {
                return null;
            }

            return response()->json([
                'message' => $exception->getMessage(),
            ], $status);
        };

        $exceptions->render(
            fn (BookingException $exception, Request $request) =>
                $renderJsonException($exception, $request, 422)
        );
    })
    ->create();