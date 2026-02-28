<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Responses\Profiles\Objects;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class Integration extends Data
{
    public function __construct(
        public string $entitlement,
        public string $userId,
    ) {}
}
