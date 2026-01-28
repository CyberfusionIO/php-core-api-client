<?php

namespace Cyberfusion\CoreApi\Requests\HaproxyListensToNodes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HaproxyListenToNodeCreateRequest;
use Cyberfusion\CoreApi\Models\HaproxyListenToNodeResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateHaproxyListenToNode extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly HaproxyListenToNodeCreateRequest $haproxyListenToNodeCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/haproxy-listens-to-nodes';
    }

    public function defaultBody(): array
    {
        return $this->haproxyListenToNodeCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns HaproxyListenToNodeResource
     */
    public function createDtoFromResponse(Response $response): HaproxyListenToNodeResource
    {
        return HaproxyListenToNodeResource::fromArray($response->json());
    }
}
