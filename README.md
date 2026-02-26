## Overview

Laravel FunnelFox is a convenient wrapper for interacting with the FunnelFox API in Laravel applications.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
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
    FUNNELFOX_WEBHOOK_PATH=webhooks/funnelfox
    FUNNELFOX_WEBHOOK_SECRET=your-webhook-secret-here
    ```

## Usage

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
