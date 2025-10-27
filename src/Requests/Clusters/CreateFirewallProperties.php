<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterFirewallPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterFirewallPropertiesResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateFirewallProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterFirewallPropertiesCreateRequest $clusterFirewallPropertiesCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/firewall', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->clusterFirewallPropertiesCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterFirewallPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterFirewallPropertiesResource
    {
        return ClusterFirewallPropertiesResource::fromArray($response->json());
    }
}
