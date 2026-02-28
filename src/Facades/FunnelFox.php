<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Facades;

use Gridwb\LaravelFunnelFox\Contracts\Resources\ProfilesContract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static ProfilesContract profiles()
 */
final class FunnelFox extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'funnelfox';
    }
}
