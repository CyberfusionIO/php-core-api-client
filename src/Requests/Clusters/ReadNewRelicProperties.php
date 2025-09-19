<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterNewRelicPropertiesResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadNewRelicProperties extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/new-relic')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns ClusterNewRelicPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterNewRelicPropertiesResource
    {
        return ClusterNewRelicPropertiesResource::fromArray($response->json());
    }
}
