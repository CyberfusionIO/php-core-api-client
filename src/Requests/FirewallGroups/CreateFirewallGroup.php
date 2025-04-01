<?php

namespace Cyberfusion\CoreApi\Requests\FirewallGroups;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\FirewallGroupCreateRequest;
use Cyberfusion\CoreApi\Models\FirewallGroupResource;
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
        return UrlBuilder::for('/api/v1/firewall-groups')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->firewallGroupCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns FirewallGroupResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): FirewallGroupResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, FirewallGroupResource::class)->build();
    }
}
