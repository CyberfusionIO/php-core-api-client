<?php

namespace Cyberfusion\CoreApi\Requests\RedisInstances;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\RedisInstanceResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadRedisInstance extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/redis-instances/%d', $this->id);
    }

    /**
     * @throws JsonException
     * @returns RedisInstanceResource
     */
    public function createDtoFromResponse(Response $response): RedisInstanceResource
    {
        return RedisInstanceResource::fromArray($response->json());
    }
}
