<?php

namespace App\Http\Controllers\Webhook\Google;

use App\Application\Webhook\Actions\DispatchRiscEvent;
use App\Application\Webhook\Actions\ValidateGoogleRiscToken;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

final class GoogleRiscWebhookController extends Controller
{
    public function __invoke(
        Request $request,
        ValidateGoogleRiscToken $validateToken,
        DispatchRiscEvent $dispatchEvent,
    ): Response {
        $token = $request->getContent();

        if (! \is_string($token) || $token === '') {
            return response()->noContent(400);
        }

        try {
            $payload = $validateToken($token);
        } catch (Throwable) {
            return response()->noContent(400);
        }

        $dispatchEvent($payload);

        return response()->noContent();
    }
}
