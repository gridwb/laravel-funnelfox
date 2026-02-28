<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Responses\Profiles;

use Gridwb\LaravelFunnelFox\Responses\AbstractResponse;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ListProfilesResponseProfile extends AbstractResponse
{
    public function __construct(
        public string $id,
        public string $createdAt,
        public bool $preview,
        public ?string $email = null,
        public ?string $country = null,
        public ?string $funnelId = null,
    ) {}
}
