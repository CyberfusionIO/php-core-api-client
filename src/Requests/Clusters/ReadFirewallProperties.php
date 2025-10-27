<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterFirewallPropertiesResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadFirewallProperties extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/firewall', $this->id);
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
