<?php

namespace Cyberfusion\CoreApi\Requests\Databases;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Usually used to clone websites/applications to and from separate production and staging environments. The right database (destination) is made identical to the left database (source), except excluded tables (`exclude_tables_names`).
 */
class SyncDatabases extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $leftDatabaseId,
        private readonly int $rightDatabaseId,
        private readonly ?string $callbackUrl = null,
        private readonly ?array $excludeTablesNames = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/databases/%d/sync', $this->leftDatabaseId);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['callback_url'] = $this->callbackUrl;
        $parameters['right_database_id'] = $this->rightDatabaseId;
        $parameters['exclude_tables_names'] = $this->excludeTablesNames;

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns TaskCollectionResource
     */
    public function createDtoFromResponse(Response $response): TaskCollectionResource
    {
        return TaskCollectionResource::fromArray($response->json());
    }
}
