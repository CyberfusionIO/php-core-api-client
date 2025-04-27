<?php

namespace Cyberfusion\CoreApi\Requests\HAProxyListensToNodes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HAProxyListenToNodeResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadHAProxyListenToNode extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/haproxy-listens-to-nodes/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
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
