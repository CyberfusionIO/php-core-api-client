<?php

namespace Cyberfusion\CoreApi\Requests\FirewallGroups;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FirewallGroupResource;
use Cyberfusion\CoreApi\Models\FirewallGroupUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateFirewallGroup extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly FirewallGroupUpdateRequest $firewallGroupUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/firewall-groups/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->firewallGroupUpdateRequest->toArray();
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
