<?php

namespace Cyberfusion\CoreApi\Requests\Databases;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DatabaseCreateRequest;
use Cyberfusion\CoreApi\Models\DatabaseResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Database Toolkit must be enabled on cluster (`database_toolkit_enabled`). Databases that were added, deleted or modified on the database server are not automatically added, deleted or modified in the API. You should keep the databases on the server and the databases in the API in sync manually. The following combinations of attributes are unique: - `server_software_name` + `name`
 */
class CreateDatabase extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly DatabaseCreateRequest $databaseCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/databases')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->databaseCreateRequest->toArray();
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
