<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterLoadBalancingPropertiesResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadLoadBalancingProperties extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/load-balancing', $this->id);
    }

    /**
     * @throws JsonException
     * @returns ClusterLoadBalancingPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterLoadBalancingPropertiesResource
    {
        return ClusterLoadBalancingPropertiesResource::fromArray($response->json());
    }
}
