<?php

namespace Cyberfusion\CoreApi\Requests\HaproxyListensToNodes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HaproxyListenToNodeResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadHaproxyListenToNode extends Request implements CoreApiRequestContract
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
     * @returns HaproxyListenToNodeResource
     */
    public function createDtoFromResponse(Response $response): HaproxyListenToNodeResource
    {
        return HaproxyListenToNodeResource::fromArray($response->json());
    }
}
