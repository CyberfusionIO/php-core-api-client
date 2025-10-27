<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterRedisPropertiesResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadRedisProperties extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/redis', $this->id);
    }

    /**
     * @throws JsonException
     * @returns ClusterRedisPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterRedisPropertiesResource
    {
        return ClusterRedisPropertiesResource::fromArray($response->json());
    }
}
