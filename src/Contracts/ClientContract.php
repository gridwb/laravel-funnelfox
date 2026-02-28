<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Contracts;

use Gridwb\LaravelFunnelFox\Contracts\Resources\ProfilesContract;

interface ClientContract
{
    public function profiles(): ProfilesContract;
}
