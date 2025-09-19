<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterLoadBalancingPropertiesResource;
use Cyberfusion\CoreApi\Models\ClusterLoadBalancingPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateLoadBalancingProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly ClusterLoadBalancingPropertiesUpdateRequest $clusterLoadBalancingPropertiesUpdateRequest,
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
        return $this->clusterLoadBalancingPropertiesUpdateRequest->toArray();
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
