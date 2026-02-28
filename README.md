## Overview

Laravel FunnelFox is a convenient wrapper for interacting with the FunnelFox API in Laravel applications.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
    - [Profiles Resource](#profiles-resource)
    - [Webhooks](#webhooks)
- [Testing](#testing)
- [Changelog](#changelog)
- [License](#license)

## Installation

1. Install the package
    ```bash
    composer require gridwb/laravel-funnelfox
    ```

2. Publish the configuration file
    ```bash
    php artisan vendor:publish --tag="funnelfox-config"
    ```

3. Add environment variables
    ```env
    FUNNELFOX_API_URL=https://api.funnelfox.io
    FUNNELFOX_KEY=your-api-key-here
    FUNNELFOX_WEBHOOK_PATH=webhooks/funnelfox
    FUNNELFOX_WEBHOOK_SECRET=your-webhook-secret-here
    ```

## Usage

### `Profiles` Resource

#### `get profile`

Retrieves a specific profile.

```php
<?php

use Gridwb\LaravelFunnelFox\Facades\FunnelFox;

$profileId = '<string>';

$response = FunnelFox::profiles()->getProfile($profileId);

echo $response->id;
echo $response->createdAt;
echo $response->funnelId;
echo $response->preview;
echo $response->email;

// Adapty integration
echo $response->integrations->adapty?->entitlement;
echo $response->integrations->adapty?->userId;

// RevenueCat integration
echo $response->integrations->adapty?->entitlement;
echo $response->integrations->adapty?->userId;
```

#### `list profiles`

Retrieves a list of profiles.

```php
<?php

use Gridwb\LaravelFunnelFox\Facades\FunnelFox;

$response = FunnelFox::profiles()->listProfiles([
    'limit' => 20,
    'cursor' => '<string>',
    'filter' => [
        'email' => '<string>',
        'funnel_id' => '<string>',
    ],
]);

foreach ($response->data as $profile) {
    echo $profile->id;
    echo $profile->createdAt;
    echo $profile->preview;
    echo $profile->email;
    echo $profile->country;
    echo $profile->funnelId;
}

echo $response->pagination->hasMore;
echo $response->pagination->total;
echo $response->pagination->nextCursor;
```

### `Webhooks`

FunnelFox can send events to your Laravel application via webhooks. By default, all webhook requests are dispatched to the
`Gridwb\LaravelFunnelFox\Jobs\ProcessWebhook::class` job, which triggers corresponding Laravel events. You can listen to
these events like any other Laravel event:

```php
<?php

use Gridwb\LaravelFunnelFox\Events\OnboardingStarted;
use Illuminate\Support\Facades\Event;

Event::listen(OnboardingStarted::class, function (OnboardingStarted $event) {
    $payload = $event->payload;
    // Access data from FunnelFox payload
});
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
