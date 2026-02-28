<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Responses\Profiles;

use Gridwb\LaravelFunnelFox\Responses\AbstractResponse;
use Gridwb\LaravelFunnelFox\Responses\Objects\Pagination;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ListProfilesResponse extends AbstractResponse
{
    /**
     * @param  Collection<int, ListProfilesResponseProfile>  $data
     */
    public function __construct(
        #[DataCollectionOf(ListProfilesResponseProfile::class)]
        public Collection $data,
        public Pagination $pagination,
    ) {}
}
