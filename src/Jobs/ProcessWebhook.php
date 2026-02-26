<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Jobs;

use Gridwb\LaravelFunnelFox\Events\AbstractEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;

class ProcessWebhook implements ShouldQueue
{
    /**
     * @var array<string, mixed>
     */
    private array $payload;

    /**
     * @param  array<string, mixed>  $payload
     */
    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }

    public function handle(): void
    {
        /** @var string|null $eventType */
        $eventType = Arr::get($this->payload, 'type');

        /** @var array<string, class-string<AbstractEvent>> $events */
        $events = Config::get('funnelfox.webhook.events', []);

        /** @var class-string<AbstractEvent>|null $event */
        $event = $events[$eventType] ?? null;

        if ($event) {
            event(new $event($this->payload));
        }
    }
}
