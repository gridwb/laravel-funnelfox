<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Events;

abstract readonly class AbstractEvent
{
    /**
     * @param  array<string, mixed>  $payload
     */
    public function __construct(public array $payload) {}
}
