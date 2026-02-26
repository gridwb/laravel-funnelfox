<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Http\Controllers;

use Gridwb\LaravelFunnelFox\Jobs\ProcessWebhook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class WebhookController
{
    public function __invoke(Request $request): JsonResponse
    {
        /** @var class-string<ProcessWebhook>|null $job */
        $job = Config::get('funnelfox.webhook.process_webhook_job');

        if ($job) {
            dispatch(new $job($request->all()));
        }

        return Response::json(['status' => true]);
    }
}
