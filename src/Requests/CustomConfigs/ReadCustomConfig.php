<?php

namespace Cyberfusion\CoreApi\Requests\CustomConfigs;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CustomConfigResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadCustomConfig extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/custom-configs/%d', $this->id);
    }

    /**
     * @throws JsonException
     * @returns CustomConfigResource
     */
    public function createDtoFromResponse(Response $response): CustomConfigResource
    {
        return CustomConfigResource::fromArray($response->json());
    }
}
