<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Resources;

use Gridwb\LaravelFunnelFox\Contracts\ApiClientContract;
use Gridwb\LaravelFunnelFox\Contracts\Resources\ProfilesContract;
use Gridwb\LaravelFunnelFox\Responses\Profiles\ListProfilesResponse;
use Gridwb\LaravelFunnelFox\Responses\Profiles\ProfileResponse;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpFoundation\Request;

readonly class Profiles implements ProfilesContract
{
    public function __construct(
        private ApiClientContract $apiClient,
    ) {}

    public function getProfile(string $profileId): ProfileResponse
    {
        $response = $this->apiClient->request(
            Request::METHOD_GET,
            "public/v1/profiles/$profileId",
        );

        return ProfileResponse::fromResponse($response);
    }

    public function listProfiles(array $parameters = []): ListProfilesResponse
    {
        $response = $this->apiClient->request(
            Request::METHOD_GET,
            'public/v1/profiles',
            [
                RequestOptions::QUERY => $parameters,
            ],
        );

        return ListProfilesResponse::fromResponse($response);
    }
}
