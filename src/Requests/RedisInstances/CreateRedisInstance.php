<?php

namespace Cyberfusion\CoreApi\Requests\RedisInstances;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\RedisInstanceCreateRequest;
use Cyberfusion\CoreApi\Models\RedisInstanceResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `name`
 */
class CreateRedisInstance extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly RedisInstanceCreateRequest $redisInstanceCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/redis-instances';
    }

    public function defaultBody(): array
    {
        return $this->redisInstanceCreateRequest->toArray();
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
