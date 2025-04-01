<?php

namespace Cyberfusion\CoreApi\Requests\RedisInstances;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\RedisInstanceResource;
use Cyberfusion\CoreApi\Models\RedisInstanceUpdateRequest;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateRedisInstance extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly RedisInstanceUpdateRequest $redisInstanceUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/redis-instances/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->redisInstanceUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns RedisInstanceResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): RedisInstanceResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, RedisInstanceResource::class)->build();
    }
}
