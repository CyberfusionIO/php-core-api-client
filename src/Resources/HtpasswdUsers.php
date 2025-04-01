<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\HtpasswdUserCreateRequest;
use Cyberfusion\CoreApi\Models\HtpasswdUserUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\HtpasswdUserUpdateRequest;
use Cyberfusion\CoreApi\Requests\HtpasswdUsers\CreateHtpasswdUser;
use Cyberfusion\CoreApi\Requests\HtpasswdUsers\DeleteHtpasswdUser;
use Cyberfusion\CoreApi\Requests\HtpasswdUsers\DeprecatedUpdateHtpasswdUser;
use Cyberfusion\CoreApi\Requests\HtpasswdUsers\ListHtpasswdUsers;
use Cyberfusion\CoreApi\Requests\HtpasswdUsers\ReadHtpasswdUser;
use Cyberfusion\CoreApi\Requests\HtpasswdUsers\UpdateHtpasswdUser;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class HtpasswdUsers extends BaseResource
{
    public function createHtpasswdUser(HtpasswdUserCreateRequest $htpasswdUserCreateRequest): Response
    {
        return $this->connector->send(new CreateHtpasswdUser($htpasswdUserCreateRequest));
    }

    public function listHtpasswdUsers(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListHtpasswdUsers($skip, $limit, $filter, $sort));
    }

    public function readHtpasswdUser(int $id): Response
    {
        return $this->connector->send(new ReadHtpasswdUser($id));
    }

    public function deprecatedUpdateHtpasswdUser(
        int $id,
        HtpasswdUserUpdateDeprecatedRequest $htpasswdUserUpdateDeprecatedRequest,
    ): Response {
        return $this->connector->send(new DeprecatedUpdateHtpasswdUser($id, $htpasswdUserUpdateDeprecatedRequest));
    }

    public function updateHtpasswdUser(int $id, HtpasswdUserUpdateRequest $htpasswdUserUpdateRequest): Response
    {
        return $this->connector->send(new UpdateHtpasswdUser($id, $htpasswdUserUpdateRequest));
    }

    public function deleteHtpasswdUser(int $id): Response
    {
        return $this->connector->send(new DeleteHtpasswdUser($id));
    }
}
