<?php

namespace Cyberfusion\CoreApi\Requests\Databases;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DatabaseResource;
use Cyberfusion\CoreApi\Models\DatabaseUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateDatabase extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly DatabaseUpdateRequest $databaseUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/databases/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->databaseUpdateRequest->toArray();
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
