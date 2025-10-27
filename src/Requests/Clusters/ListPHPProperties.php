<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterPhpPropertiesResource;
use Cyberfusion\CoreApi\Models\ClustersPhpPropertiesSearchRequest;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class ListPHPProperties extends Request implements CoreApiRequestContract, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?ClustersPhpPropertiesSearchRequest $includeFilters = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/clusters/properties/php';
    }

    protected function defaultQuery(): array
    {
        $parameters = $this->includeFilters?->toArray() ?? [];

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns Collection<ClusterPhpPropertiesResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => ClusterPhpPropertiesResource::fromArray($item));
    }
}
