<?php

namespace Cyberfusion\CoreApi\Requests\FirewallRules;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FirewallRuleCreateRequest;
use Cyberfusion\CoreApi\Models\FirewallRuleResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateFirewallRule extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly FirewallRuleCreateRequest $firewallRuleCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/firewall-rules';
    }

    public function defaultBody(): array
    {
        return $this->firewallRuleCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns FirewallRuleResource
     */
    public function createDtoFromResponse(Response $response): FirewallRuleResource
    {
        return FirewallRuleResource::fromArray($response->json());
    }
}
