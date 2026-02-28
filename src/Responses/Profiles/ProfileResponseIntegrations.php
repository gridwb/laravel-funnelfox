<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Responses\Profiles;

use Gridwb\LaravelFunnelFox\Responses\Profiles\Objects\Integration;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ProfileResponseIntegrations extends Data
{
    public function __construct(
        public ?Integration $adapty = null,
        public ?Integration $revenueCat = null,
    ) {}
}
