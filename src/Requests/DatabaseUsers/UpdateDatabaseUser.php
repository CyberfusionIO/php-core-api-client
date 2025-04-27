<?php

namespace Cyberfusion\CoreApi\Requests\DatabaseUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DatabaseUserResource;
use Cyberfusion\CoreApi\Models\DatabaseUserUpdateRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateDatabaseUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly DatabaseUserUpdateRequest $databaseUserUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/database-users/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->databaseUserUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns DatabaseUserResource
     */
    public function createDtoFromResponse(Response $response): DatabaseUserResource
    {
        return DatabaseUserResource::fromArray($response->json());
    }
}
