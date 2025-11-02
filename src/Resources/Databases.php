<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Enums\TimeUnitEnum;
use Cyberfusion\CoreApi\Models\DatabaseCreateRequest;
use Cyberfusion\CoreApi\Models\DatabaseUpdateRequest;
use Cyberfusion\CoreApi\Models\DatabasesSearchRequest;
use Cyberfusion\CoreApi\Requests\Databases\CompareDatabases;
use Cyberfusion\CoreApi\Requests\Databases\CreateDatabase;
use Cyberfusion\CoreApi\Requests\Databases\DeleteDatabase;
use Cyberfusion\CoreApi\Requests\Databases\ListDatabaseUsages;
use Cyberfusion\CoreApi\Requests\Databases\ListDatabases;
use Cyberfusion\CoreApi\Requests\Databases\ReadDatabase;
use Cyberfusion\CoreApi\Requests\Databases\SyncDatabases;
use Cyberfusion\CoreApi\Requests\Databases\UpdateDatabase;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class Databases extends CoreApiResource
{
    public function createDatabase(DatabaseCreateRequest $databaseCreateRequest): Response
    {
        return $this->connector->send(new CreateDatabase($databaseCreateRequest));
    }

    public function listDatabases(?DatabasesSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListDatabases($includeFilters, $includes));
    }

    public function readDatabase(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadDatabase($id, $includes));
    }

    public function updateDatabase(int $id, DatabaseUpdateRequest $databaseUpdateRequest): Response
    {
        return $this->connector->send(new UpdateDatabase($id, $databaseUpdateRequest));
    }

    public function deleteDatabase(int $id, ?bool $deleteOnCluster = null): Response
    {
        return $this->connector->send(new DeleteDatabase($id, $deleteOnCluster));
    }

    public function compareDatabases(int $leftDatabaseId, int $rightDatabaseId): Response
    {
        return $this->connector->send(new CompareDatabases($leftDatabaseId, $rightDatabaseId));
    }

    public function syncDatabases(
        int $leftDatabaseId,
        int $rightDatabaseId,
        ?string $callbackUrl = null,
        ?array $excludeTablesNames = null,
    ): Response {
        return $this->connector->send(new SyncDatabases($leftDatabaseId, $rightDatabaseId, $callbackUrl, $excludeTablesNames));
    }

    public function listDatabaseUsages(int $databaseId, string $timestamp, ?TimeUnitEnum $timeUnit = null): Response
    {
        return $this->connector->send(new ListDatabaseUsages($databaseId, $timestamp, $timeUnit));
    }
}
