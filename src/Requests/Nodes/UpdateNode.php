<?php

namespace Cyberfusion\CoreApi\Requests\Nodes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\NodeResource;
use Cyberfusion\CoreApi\Models\NodeUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateNode extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly NodeUpdateRequest $nodeUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/nodes/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->nodeUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns NodeResource
     */
    public function createDtoFromResponse(Response $response): NodeResource
    {
        return NodeResource::fromArray($response->json());
    }
}
