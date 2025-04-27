<?php

namespace Cyberfusion\CoreApi\Requests\DatabaseUserGrants;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DatabaseUserGrantCreateRequest;
use Cyberfusion\CoreApi\Models\DatabaseUserGrantResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Database user grants that were added, deleted or modified on the database server are not automatically added, deleted or modified in the API. You should keep the database user grants on the server and the database user grants in the API in sync manually. The following combinations of attributes are unique: - `database_id` + `database_user_id` + `table_name` + `privilege_name`
 */
class CreateDatabaseUserGrant extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly DatabaseUserGrantCreateRequest $databaseUserGrantCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/database-user-grants')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->databaseUserGrantCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns DatabaseUserGrantResource
     */
    public function createDtoFromResponse(Response $response): DatabaseUserGrantResource
    {
        return DatabaseUserGrantResource::fromArray($response->json());
    }
}
