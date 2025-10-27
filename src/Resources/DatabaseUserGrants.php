<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\DatabaseUserGrantCreateRequest;
use Cyberfusion\CoreApi\Models\DatabaseUserGrantsSearchRequest;
use Cyberfusion\CoreApi\Requests\DatabaseUserGrants\CreateDatabaseUserGrant;
use Cyberfusion\CoreApi\Requests\DatabaseUserGrants\DeleteDatabaseUserGrant;
use Cyberfusion\CoreApi\Requests\DatabaseUserGrants\ListDatabaseUserGrants;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class DatabaseUserGrants extends CoreApiResource
{
    public function createDatabaseUserGrant(DatabaseUserGrantCreateRequest $databaseUserGrantCreateRequest): Response
    {
        return $this->connector->send(new CreateDatabaseUserGrant($databaseUserGrantCreateRequest));
    }

    public function listDatabaseUserGrants(?DatabaseUserGrantsSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListDatabaseUserGrants($includeFilters));
    }

    public function deleteDatabaseUserGrant(int $id): Response
    {
        return $this->connector->send(new DeleteDatabaseUserGrant($id));
    }
}
