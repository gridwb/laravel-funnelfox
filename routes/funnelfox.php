<?php

use Gridwb\LaravelFunnelFox\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::middleware(Config::get('funnelfox.webhook.middleware'))
    ->post(Config::get('funnelfox.webhook.path'), WebhookController::class);
