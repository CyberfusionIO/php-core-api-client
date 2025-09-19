<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\DatabaseUserCreateRequest;
use Cyberfusion\CoreApi\Models\DatabaseUserUpdateRequest;
use Cyberfusion\CoreApi\Requests\DatabaseUsers\CreateDatabaseUser;
use Cyberfusion\CoreApi\Requests\DatabaseUsers\DeleteDatabaseUser;
use Cyberfusion\CoreApi\Requests\DatabaseUsers\ListDatabaseUsers;
use Cyberfusion\CoreApi\Requests\DatabaseUsers\ReadDatabaseUser;
use Cyberfusion\CoreApi\Requests\DatabaseUsers\UpdateDatabaseUser;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class DatabaseUsers extends BaseResource
{
    public function createDatabaseUser(DatabaseUserCreateRequest $databaseUserCreateRequest): Response
    {
        return $this->connector->send(new CreateDatabaseUser($databaseUserCreateRequest));
    }

    public function listDatabaseUsers(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListDatabaseUsers($skip, $limit, $filter, $sort));
    }

    public function readDatabaseUser(int $id): Response
    {
        return $this->connector->send(new ReadDatabaseUser($id));
    }

    public function updateDatabaseUser(int $id, DatabaseUserUpdateRequest $databaseUserUpdateRequest): Response
    {
        return $this->connector->send(new UpdateDatabaseUser($id, $databaseUserUpdateRequest));
    }

    public function deleteDatabaseUser(int $id): Response
    {
        return $this->connector->send(new DeleteDatabaseUser($id));
    }
}
