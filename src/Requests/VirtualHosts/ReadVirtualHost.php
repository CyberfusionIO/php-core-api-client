<?php

namespace Cyberfusion\CoreApi\Requests\VirtualHosts;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\VirtualHostResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadVirtualHost extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/virtual-hosts/%d', $this->id);
    }

    /**
     * @throws JsonException
     * @returns VirtualHostResource
     */
    public function createDtoFromResponse(Response $response): VirtualHostResource
    {
        return VirtualHostResource::fromArray($response->json());
    }
}
