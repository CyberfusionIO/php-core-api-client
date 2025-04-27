<?php

namespace Cyberfusion\CoreApi\Requests\DatabaseUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DatabaseUserResource;
use Cyberfusion\CoreApi\Models\DatabaseUserUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following properties can never be updated to a different value: * `name` * `host` * `server_software_name`
 */
class DeprecatedUpdateDatabaseUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly DatabaseUserUpdateDeprecatedRequest $databaseUserUpdateDeprecatedRequest,
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
        return $this->databaseUserUpdateDeprecatedRequest->toArray();
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
