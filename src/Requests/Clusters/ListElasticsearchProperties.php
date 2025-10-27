<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterElasticsearchPropertiesResource;
use Cyberfusion\CoreApi\Models\ClustersElasticsearchPropertiesSearchRequest;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class ListElasticsearchProperties extends Request implements CoreApiRequestContract, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?ClustersElasticsearchPropertiesSearchRequest $includeFilters = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/clusters/properties/elasticsearch';
    }

    protected function defaultQuery(): array
    {
        $parameters = $this->includeFilters?->toArray() ?? [];

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns Collection<ClusterElasticsearchPropertiesResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => ClusterElasticsearchPropertiesResource::fromArray($item));
    }
}
