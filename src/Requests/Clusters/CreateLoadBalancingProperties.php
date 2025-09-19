<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterLoadBalancingPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterLoadBalancingPropertiesResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateLoadBalancingProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterLoadBalancingPropertiesCreateRequest $clusterLoadBalancingPropertiesCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/load-balancing')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->clusterLoadBalancingPropertiesCreateRequest->toArray();
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
