<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Enums\TimeUnitEnum;
use Cyberfusion\CoreApi\Models\UNIXUserCreateRequest;
use Cyberfusion\CoreApi\Models\UNIXUserUpdateRequest;
use Cyberfusion\CoreApi\Models\UnixUsersSearchRequest;
use Cyberfusion\CoreApi\Requests\UNIXUsers\CompareUNIXUsers;
use Cyberfusion\CoreApi\Requests\UNIXUsers\CreateUNIXUser;
use Cyberfusion\CoreApi\Requests\UNIXUsers\DeleteUNIXUser;
use Cyberfusion\CoreApi\Requests\UNIXUsers\ListUNIXUserUsages;
use Cyberfusion\CoreApi\Requests\UNIXUsers\ListUNIXUsers;
use Cyberfusion\CoreApi\Requests\UNIXUsers\ReadUNIXUser;
use Cyberfusion\CoreApi\Requests\UNIXUsers\UpdateUNIXUser;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class UNIXUsers extends CoreApiResource
{
    public function createUNIXUser(UNIXUserCreateRequest $uNIXUserCreateRequest): Response
    {
        return $this->connector->send(new CreateUNIXUser($uNIXUserCreateRequest));
    }

    public function listUNIXUsers(?UnixUsersSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListUNIXUsers($includeFilters, $includes));
    }

    public function readUNIXUser(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadUNIXUser($id, $includes));
    }

    public function updateUNIXUser(int $id, UNIXUserUpdateRequest $uNIXUserUpdateRequest): Response
    {
        return $this->connector->send(new UpdateUNIXUser($id, $uNIXUserUpdateRequest));
    }

    public function deleteUNIXUser(int $id, ?bool $deleteOnCluster = null): Response
    {
        return $this->connector->send(new DeleteUNIXUser($id, $deleteOnCluster));
    }

    public function compareUNIXUsers(int $leftUnixUserId, int $rightUnixUserId): Response
    {
        return $this->connector->send(new CompareUNIXUsers($leftUnixUserId, $rightUnixUserId));
    }

    public function listUNIXUserUsages(
        int $id,
        string $timestamp,
        ?TimeUnitEnum $timeUnit = null,
        array $includes = [],
    ): Response {
        return $this->connector->send(new ListUNIXUserUsages($id, $timestamp, $timeUnit, $includes));
    }
}
