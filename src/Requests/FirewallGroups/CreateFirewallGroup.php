<?php

namespace Cyberfusion\CoreApi\Requests\FirewallGroups;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FirewallGroupCreateRequest;
use Cyberfusion\CoreApi\Models\FirewallGroupResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `name` + `cluster_id`
 */
class CreateFirewallGroup extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly FirewallGroupCreateRequest $firewallGroupCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/firewall-groups';
    }

    public function defaultBody(): array
    {
        return $this->firewallGroupCreateRequest->toArray();
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
