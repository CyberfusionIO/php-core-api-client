<?php

namespace Cyberfusion\CoreApi\Requests\FirewallGroups;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * The firewall group may no longer be used by database users and domain routers.
 */
class DeleteFirewallGroup extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::DELETE;

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
     * @returns DetailMessage
     */
    public function createDtoFromResponse(Response $response): DetailMessage
    {
        return DetailMessage::fromArray($response->json());
    }
}
