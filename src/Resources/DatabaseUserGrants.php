<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\DatabaseUserGrantCreateRequest;
use Cyberfusion\CoreApi\Requests\DatabaseUserGrants\CreateDatabaseUserGrant;
use Cyberfusion\CoreApi\Requests\DatabaseUserGrants\ListDatabaseUserGrants;
use Cyberfusion\CoreApi\Requests\DatabaseUserGrants\ListDatabaseUserGrantsForDatabaseUsers;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class DatabaseUserGrants extends BaseResource
{
    public function createDatabaseUserGrant(DatabaseUserGrantCreateRequest $databaseUserGrantCreateRequest): Response
    {
        return $this->connector->send(new CreateDatabaseUserGrant($databaseUserGrantCreateRequest));
    }

    public function listDatabaseUserGrants(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListDatabaseUserGrants($skip, $limit, $filter, $sort));
    }

    public function listDatabaseUserGrantsForDatabaseUsers(
        int $databaseUserId,
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListDatabaseUserGrantsForDatabaseUsers($databaseUserId, $skip, $limit, $filter, $sort));
    }
}
