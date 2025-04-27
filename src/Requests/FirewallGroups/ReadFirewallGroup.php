<?php

namespace Cyberfusion\CoreApi\Requests\FirewallGroups;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FirewallGroupResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadFirewallGroup extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/firewall-groups/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns FirewallGroupResource
     */
    public function createDtoFromResponse(Response $response): FirewallGroupResource
    {
        return FirewallGroupResource::fromArray($response->json());
    }
}
