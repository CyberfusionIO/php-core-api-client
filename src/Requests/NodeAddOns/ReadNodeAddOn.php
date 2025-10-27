<?php

namespace Cyberfusion\CoreApi\Requests\NodeAddOns;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\NodeAddOnResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadNodeAddOn extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/node-add-ons/%d', $this->id);
    }

    /**
     * @throws JsonException
     * @returns NodeAddOnResource
     */
    public function createDtoFromResponse(Response $response): NodeAddOnResource
    {
        return NodeAddOnResource::fromArray($response->json());
    }
}
