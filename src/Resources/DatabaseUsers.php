<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\DatabaseUserCreateRequest;
use Cyberfusion\CoreApi\Models\DatabaseUserUpdateRequest;
use Cyberfusion\CoreApi\Models\DatabaseUsersSearchRequest;
use Cyberfusion\CoreApi\Requests\DatabaseUsers\CreateDatabaseUser;
use Cyberfusion\CoreApi\Requests\DatabaseUsers\DeleteDatabaseUser;
use Cyberfusion\CoreApi\Requests\DatabaseUsers\ListDatabaseUsers;
use Cyberfusion\CoreApi\Requests\DatabaseUsers\ReadDatabaseUser;
use Cyberfusion\CoreApi\Requests\DatabaseUsers\UpdateDatabaseUser;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class DatabaseUsers extends CoreApiResource
{
    public function createDatabaseUser(DatabaseUserCreateRequest $databaseUserCreateRequest): Response
    {
        return $this->connector->send(new CreateDatabaseUser($databaseUserCreateRequest));
    }

    public function listDatabaseUsers(
        ?DatabaseUsersSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListDatabaseUsers($includeFilters, $includes));
    }

    public function readDatabaseUser(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadDatabaseUser($id, $includes));
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
