<?php

namespace Cyberfusion\CoreApi\Requests\FirewallRules;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\FirewallRuleCreateRequest;
use Cyberfusion\CoreApi\Models\FirewallRuleResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `node_id` + `external_provider_name` + `service_name` - `node_id` + `external_provider_name` + `haproxy_listen_id` - `node_id` + `external_provider_name` + `port` - `node_id` + `firewall_group_id` + `service_name` - `node_id` + `firewall_group_id` + `haproxy_listen_id` - `node_id` + `firewall_group_id` + `port`
 */
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
        return UrlBuilder::for('/api/v1/firewall-rules')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->firewallRuleCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns FirewallRuleResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): FirewallRuleResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, FirewallRuleResource::class)->build();
    }
}
