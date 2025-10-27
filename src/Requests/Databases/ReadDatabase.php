<?php

namespace Cyberfusion\CoreApi\Requests\Databases;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DatabaseResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadDatabase extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/databases/%d', $this->id);
    }

    /**
     * @throws JsonException
     * @returns DatabaseResource
     */
    public function createDtoFromResponse(Response $response): DatabaseResource
    {
        return DatabaseResource::fromArray($response->json());
    }
}
