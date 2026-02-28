<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Contracts\Resources;

use Gridwb\LaravelFunnelFox\Responses\Profiles\ListProfilesResponse;
use Gridwb\LaravelFunnelFox\Responses\Profiles\ProfileResponse;
use GuzzleHttp\Exception\GuzzleException;

interface ProfilesContract
{
    /**
     * @throws GuzzleException
     *
     * @see https://funnelfox.com/docs/api-reference/get-profile
     */
    public function getProfile(string $profileId): ProfileResponse;

    /**
     * @param  array<string, mixed>  $parameters
     *
     * @throws GuzzleException
     *
     * @see https://funnelfox.com/docs/api-reference/list-profiles
     */
    public function listProfiles(array $parameters = []): ListProfilesResponse;
}
