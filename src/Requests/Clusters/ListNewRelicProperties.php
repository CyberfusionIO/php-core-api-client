<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterNewRelicPropertiesResource;
use Cyberfusion\CoreApi\Models\ClustersNewRelicPropertiesSearchRequest;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class ListNewRelicProperties extends Request implements CoreApiRequestContract, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?ClustersNewRelicPropertiesSearchRequest $includeFilters = null,
        private readonly array $includes = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/clusters/properties/new-relic';
    }

    protected function defaultQuery(): array
    {
        $parameters = $this->includeFilters?->toArray() ?? [];
        $parameters['includes'] = implode(',', $this->includes);

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns Collection<ClusterNewRelicPropertiesResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => ClusterNewRelicPropertiesResource::fromArray($item));
    }
}
