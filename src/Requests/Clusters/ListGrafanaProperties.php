<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterGrafanaPropertiesResource;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListGrafanaProperties extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?int $skip = null,
        private readonly ?int $limit = null,
        private readonly ?Filter $filter = null,
        private readonly ?Sorter $sort = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/properties/grafana')
            ->addQueryParameter('skip', $this->skip)
            ->addQueryParameter('limit', $this->limit)
            ->filter($this->filter)
            ->sorter($this->sort)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns Collection<ClusterGrafanaPropertiesResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => ClusterGrafanaPropertiesResource::fromArray($item));
    }
}
