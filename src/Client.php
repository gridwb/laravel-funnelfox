<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox;

use Gridwb\LaravelFunnelFox\Contracts\ApiClientContract;
use Gridwb\LaravelFunnelFox\Contracts\ClientContract;
use Gridwb\LaravelFunnelFox\Contracts\Resources\ProfilesContract;
use Gridwb\LaravelFunnelFox\Resources\Profiles;

readonly class Client implements ClientContract
{
    public function __construct(
        private ApiClientContract $apiClient,
    ) {}

    public function profiles(): ProfilesContract
    {
        return new Profiles($this->apiClient);
    }
}
