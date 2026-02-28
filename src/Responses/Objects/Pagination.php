<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Responses\Objects;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class Pagination extends Data
{
    public function __construct(
        public bool $hasMore,
        public ?int $total = null,
        public ?string $nextCursor = null,
    ) {}
}
