<?php

namespace Cyberfusion\CoreApi\Requests\HAProxyListensToNodes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HAProxyListenToNodeCreateRequest;
use Cyberfusion\CoreApi\Models\HAProxyListenToNodeResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `name`
 */
class CreateHAProxyListenToNode extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly HAProxyListenToNodeCreateRequest $hAProxyListenToNodeCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/haproxy-listens-to-nodes';
    }

    public function defaultBody(): array
    {
        return $this->hAProxyListenToNodeCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns HAProxyListenToNodeResource
     */
    public function createDtoFromResponse(Response $response): HAProxyListenToNodeResource
    {
        return HAProxyListenToNodeResource::fromArray($response->json());
    }
}
