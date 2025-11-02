<?php

namespace Cyberfusion\CoreApi\Requests\Regions;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\RegionResource;
use Cyberfusion\CoreApi\Models\RegionsSearchRequest;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Http\SoloRequest;

class ListRegions extends SoloRequest implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $baseUrl,
        private readonly ?RegionsSearchRequest $includeFilters = null,
        private readonly array $includes = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return $this->baseUrl . '/api/v1/regions';
    }

    protected function defaultQuery(): array
    {
        $parameters = $this->includeFilters?->toArray() ?? [];
        $parameters['includes'] = implode(',', $this->includes);

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns Collection<RegionResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => RegionResource::fromArray($item));
    }
}
