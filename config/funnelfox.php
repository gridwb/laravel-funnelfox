<?php

return [

    /*
    |--------------------------------------------------------------------------
    | FunnelFox Webhook
    |--------------------------------------------------------------------------
    |
    | @see https://funnelfox.com/docs/develop/webhooks
    |
    */

    'webhook' => [
        /*
        |--------------------------------------------------------------------------
        | Webhook Path
        |--------------------------------------------------------------------------
        |
        | The URI path where FunnelFox will send webhook POST requests.
        |
        */

        'path' => env('FUNNELFOX_WEBHOOK_PATH', 'webhooks/funnelfox'),

        /*
        |--------------------------------------------------------------------------
        | Webhook Secret
        |--------------------------------------------------------------------------
        |
        | A secret token used to verify incoming webhook requests.
        |
        */

        'secret' => env('FUNNELFOX_WEBHOOK_SECRET'),

        /*
        |--------------------------------------------------------------------------
        | Middleware
        |--------------------------------------------------------------------------
        |
        | Optional middleware to run before processing the webhook.
        |
        */

        'middleware' => [
            \Gridwb\LaravelFunnelFox\Http\Middleware\VerifyWebhookAuthorization::class,
        ],

        /*
        |--------------------------------------------------------------------------
        | Webhook Processing Job
        |--------------------------------------------------------------------------
        |
        | The job class that handles processing of incoming webhook payloads.
        | The class must extend Gridwb\LaravelFunnelFox\Jobs\ProcessWebhook.
        |
        */

        'process_webhook_job' => \Gridwb\LaravelFunnelFox\Jobs\ProcessWebhook::class,

        /*
        |--------------------------------------------------------------------------
        | Event Mapping
        |--------------------------------------------------------------------------
        |
        | Map FunnelFox webhook "type" values to Laravel event classes.
        | @see https://funnelfox.com/docs/develop/webhooks#payload-structure
        | Each class must extend Gridwb\LaravelFunnelFox\Events\AbstractEvent.
        |
        */

        'events' => [
            'onboarding.started' => \Gridwb\LaravelFunnelFox\Events\OnboardingStarted::class,
            'onboarding.completed' => \Gridwb\LaravelFunnelFox\Events\OnboardingCompleted::class,
            'profile.updated' => \Gridwb\LaravelFunnelFox\Events\ProfileUpdated::class,
            'purchase.completed' => \Gridwb\LaravelFunnelFox\Events\PurchaseCompleted::class,
            'subscription.created' => \Gridwb\LaravelFunnelFox\Events\SubscriptionCreated::class,
            'subscription.trialing' => \Gridwb\LaravelFunnelFox\Events\SubscriptionTrialing::class,
            'subscription.active' => \Gridwb\LaravelFunnelFox\Events\SubscriptionActive::class,
            'subscription.cycle' => \Gridwb\LaravelFunnelFox\Events\SubscriptionCycle::class,
            'subscription.paused' => \Gridwb\LaravelFunnelFox\Events\SubscriptionPaused::class,
            'subscription.resumed' => \Gridwb\LaravelFunnelFox\Events\SubscriptionResumed::class,
            'subscription.cancelled' => \Gridwb\LaravelFunnelFox\Events\SubscriptionCancelled::class,
            'subscription.unpaid' => \Gridwb\LaravelFunnelFox\Events\SubscriptionUnpaid::class,
        ],
    ],
];
