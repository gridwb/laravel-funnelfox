<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Responses;

use GuzzleHttp\Utils;
use Psr\Http\Message\ResponseInterface;
use Spatie\LaravelData\Data;

abstract class AbstractResponse extends Data
{
    public static function fromResponse(ResponseInterface $response): static
    {
        $data = Utils::jsonDecode($response->getBody()->getContents(), true);

        if (! is_array($data)) {
            $data = [];
        }

        return static::from($data);
    }
}
