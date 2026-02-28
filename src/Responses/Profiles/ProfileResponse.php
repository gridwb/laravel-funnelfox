<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Responses\Profiles;

use Gridwb\LaravelFunnelFox\Responses\AbstractResponse;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ProfileResponse extends AbstractResponse
{
    public function __construct(
        public string $id,
        public int $createdAt,
        public string $funnelId,
        public bool $preview,
        public ProfileResponseIntegrations $integrations,
        public ?string $email,
    ) {}
}
