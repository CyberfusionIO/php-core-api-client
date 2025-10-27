<?php

namespace Cyberfusion\CoreApi\Requests\FirewallRules;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FirewallRuleResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadFirewallRule extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/firewall-rules/%d', $this->id);
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
