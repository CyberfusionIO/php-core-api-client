<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Enums\TimeUnitEnum;
use Cyberfusion\CoreApi\Models\UnixUserCreateRequest;
use Cyberfusion\CoreApi\Models\UnixUserUpdateRequest;
use Cyberfusion\CoreApi\Models\UnixUsersSearchRequest;
use Cyberfusion\CoreApi\Requests\UnixUsers\CompareUnixUsers;
use Cyberfusion\CoreApi\Requests\UnixUsers\CreateUnixUser;
use Cyberfusion\CoreApi\Requests\UnixUsers\DeleteUnixUser;
use Cyberfusion\CoreApi\Requests\UnixUsers\ListUnixUserUsages;
use Cyberfusion\CoreApi\Requests\UnixUsers\ListUnixUsers;
use Cyberfusion\CoreApi\Requests\UnixUsers\ReadUnixUser;
use Cyberfusion\CoreApi\Requests\UnixUsers\UpdateUnixUser;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class UnixUsers extends CoreApiResource
{
    public function createUnixUser(UnixUserCreateRequest $unixUserCreateRequest): Response
    {
        return $this->connector->send(new CreateUnixUser($unixUserCreateRequest));
    }

    public function listUnixUsers(?UnixUsersSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListUnixUsers($includeFilters, $includes));
    }

    public function readUnixUser(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadUnixUser($id, $includes));
    }

    public function updateUnixUser(int $id, UnixUserUpdateRequest $unixUserUpdateRequest): Response
    {
        return $this->connector->send(new UpdateUnixUser($id, $unixUserUpdateRequest));
    }

    public function deleteUnixUser(int $id, ?bool $deleteOnCluster = null): Response
    {
        return $this->connector->send(new DeleteUnixUser($id, $deleteOnCluster));
    }

    public function compareUnixUsers(int $leftUnixUserId, int $rightUnixUserId): Response
    {
        return $this->connector->send(new CompareUnixUsers($leftUnixUserId, $rightUnixUserId));
    }

    public function listUnixUserUsages(
        int $id,
        string $timestamp,
        ?TimeUnitEnum $timeUnit = null,
        array $includes = [],
    ): Response {
        return $this->connector->send(new ListUnixUserUsages($id, $timestamp, $timeUnit, $includes));
    }
}
