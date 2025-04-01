<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\UNIXUserCreateRequest;
use Cyberfusion\CoreApi\Models\UNIXUserUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\UNIXUserUpdateRequest;
use Cyberfusion\CoreApi\Requests\UNIXUsers\CompareUNIXUsers;
use Cyberfusion\CoreApi\Requests\UNIXUsers\CreateUNIXUser;
use Cyberfusion\CoreApi\Requests\UNIXUsers\DeleteUNIXUser;
use Cyberfusion\CoreApi\Requests\UNIXUsers\DeprecatedUpdateUNIXUser;
use Cyberfusion\CoreApi\Requests\UNIXUsers\ListUNIXUserUsages;
use Cyberfusion\CoreApi\Requests\UNIXUsers\ListUNIXUsers;
use Cyberfusion\CoreApi\Requests\UNIXUsers\ReadUNIXUser;
use Cyberfusion\CoreApi\Requests\UNIXUsers\UpdateUNIXUser;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class UNIXUsers extends BaseResource
{
    public function createUNIXUser(UNIXUserCreateRequest $uNIXUserCreateRequest): Response
    {
        return $this->connector->send(new CreateUNIXUser($uNIXUserCreateRequest));
    }

    public function listUNIXUsers(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListUNIXUsers($skip, $limit, $filter, $sort));
    }

    public function readUNIXUser(int $id): Response
    {
        return $this->connector->send(new ReadUNIXUser($id));
    }

    public function deprecatedUpdateUNIXUser(
        int $id,
        UNIXUserUpdateDeprecatedRequest $uNIXUserUpdateDeprecatedRequest,
    ): Response {
        return $this->connector->send(new DeprecatedUpdateUNIXUser($id, $uNIXUserUpdateDeprecatedRequest));
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

    public function listUNIXUserUsages(int $unixUserId, string $timestamp, ?string $timeUnit = null): Response
    {
        return $this->connector->send(new ListUNIXUserUsages($unixUserId, $timestamp, $timeUnit));
    }
}
