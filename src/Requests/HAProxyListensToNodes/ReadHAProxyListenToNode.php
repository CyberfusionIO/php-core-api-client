<?php

namespace Cyberfusion\CoreApi\Requests\HAProxyListensToNodes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HAProxyListenToNodeResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadHAProxyListenToNode extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
        private readonly array $includes = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/haproxy-listens-to-nodes/%d', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['includes'] = implode(',', $this->includes);

        return array_filter($parameters);
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
