<?php

namespace Cyberfusion\CoreApi\Requests\BorgRepositories;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BorgRepositoryResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadBorgRepository extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/borg-repositories/%d', $this->id);
    }

    /**
     * @throws JsonException
     * @returns BorgRepositoryResource
     */
    public function createDtoFromResponse(Response $response): BorgRepositoryResource
    {
        return BorgRepositoryResource::fromArray($response->json());
    }
}
