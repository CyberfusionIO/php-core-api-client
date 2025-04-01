<?php

namespace Cyberfusion\CoreApi\Requests\Databases;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Usually used to clone websites/applications to and from separate production and staging environments. The right database (destination) is made identical to the left database (source), except excluded tables (`exclude_tables_names`). Sync Toolkit and Database Toolkit must be enabled on the cluster(s) of the left and right database clusters (`sync_toolkit_enabled`, `database_toolkit_enabled`).
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
        return UrlBuilder::for('/api/v1/databases/%d/sync')
            ->addPathParameter($this->leftDatabaseId)
            ->addQueryParameter('callback_url', $this->callbackUrl)
            ->addQueryParameter('right_database_id', $this->rightDatabaseId)
            ->addQueryParameter('exclude_tables_names', $this->excludeTablesNames)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns TaskCollectionResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): TaskCollectionResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, TaskCollectionResource::class)->build();
    }
}
