<?php

namespace Cyberfusion\CoreApi\Requests\DatabaseUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DatabaseUserCreateRequest;
use Cyberfusion\CoreApi\Models\DatabaseUserResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Database users that were added, deleted or modified on the database server are not automatically added, deleted or modified in the API. You should keep the database users on the server and the database users in the API in sync manually. The following combinations of attributes are unique: - `name` + `cluster_id` + `host`
 */
class CreateDatabaseUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly DatabaseUserCreateRequest $databaseUserCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/database-users')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->databaseUserCreateRequest->toArray();
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
