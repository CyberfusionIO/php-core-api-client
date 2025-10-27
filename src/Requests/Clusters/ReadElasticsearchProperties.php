<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterElasticsearchPropertiesResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadElasticsearchProperties extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/elasticsearch', $this->id);
    }

    /**
     * @throws JsonException
     * @returns ClusterElasticsearchPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterElasticsearchPropertiesResource
    {
        return ClusterElasticsearchPropertiesResource::fromArray($response->json());
    }
}
