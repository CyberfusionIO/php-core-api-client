<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\DatabaseCreateRequest;
use Cyberfusion\CoreApi\Models\DatabaseUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\DatabaseUpdateRequest;
use Cyberfusion\CoreApi\Requests\Databases\CompareDatabases;
use Cyberfusion\CoreApi\Requests\Databases\CreateDatabase;
use Cyberfusion\CoreApi\Requests\Databases\DeleteDatabase;
use Cyberfusion\CoreApi\Requests\Databases\DeprecatedUpdateDatabase;
use Cyberfusion\CoreApi\Requests\Databases\ListDatabaseUsages;
use Cyberfusion\CoreApi\Requests\Databases\ListDatabases;
use Cyberfusion\CoreApi\Requests\Databases\ReadDatabase;
use Cyberfusion\CoreApi\Requests\Databases\SyncDatabases;
use Cyberfusion\CoreApi\Requests\Databases\UpdateDatabase;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Databases extends BaseResource
{
    public function createDatabase(DatabaseCreateRequest $databaseCreateRequest): Response
    {
        return $this->connector->send(new CreateDatabase($databaseCreateRequest));
    }

    public function listDatabases(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListDatabases($skip, $limit, $filter, $sort));
    }

    public function readDatabase(int $id): Response
    {
        return $this->connector->send(new ReadDatabase($id));
    }

    public function deprecatedUpdateDatabase(
        int $id,
        DatabaseUpdateDeprecatedRequest $databaseUpdateDeprecatedRequest,
    ): Response {
        return $this->connector->send(new DeprecatedUpdateDatabase($id, $databaseUpdateDeprecatedRequest));
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

    public function listDatabaseUsages(int $databaseId, string $timestamp, ?string $timeUnit = null): Response
    {
        return $this->connector->send(new ListDatabaseUsages($databaseId, $timestamp, $timeUnit));
    }
}
