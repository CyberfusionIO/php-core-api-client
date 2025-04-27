<?php

namespace Cyberfusion\CoreApi\Requests\HAProxyListens;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HAProxyListenResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadHAProxyListen extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/haproxy-listens/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns HAProxyListenResource
     */
    public function createDtoFromResponse(Response $response): HAProxyListenResource
    {
        return HAProxyListenResource::fromArray($response->json());
    }
}
