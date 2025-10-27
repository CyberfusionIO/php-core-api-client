<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\HtpasswdUserCreateRequest;
use Cyberfusion\CoreApi\Models\HtpasswdUserUpdateRequest;
use Cyberfusion\CoreApi\Models\HtpasswdUsersSearchRequest;
use Cyberfusion\CoreApi\Requests\HtpasswdUsers\CreateHtpasswdUser;
use Cyberfusion\CoreApi\Requests\HtpasswdUsers\DeleteHtpasswdUser;
use Cyberfusion\CoreApi\Requests\HtpasswdUsers\ListHtpasswdUsers;
use Cyberfusion\CoreApi\Requests\HtpasswdUsers\ReadHtpasswdUser;
use Cyberfusion\CoreApi\Requests\HtpasswdUsers\UpdateHtpasswdUser;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class HtpasswdUsers extends CoreApiResource
{
    public function createHtpasswdUser(HtpasswdUserCreateRequest $htpasswdUserCreateRequest): Response
    {
        return $this->connector->send(new CreateHtpasswdUser($htpasswdUserCreateRequest));
    }

    public function listHtpasswdUsers(?HtpasswdUsersSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListHtpasswdUsers($includeFilters));
    }

    public function readHtpasswdUser(int $id): Response
    {
        return $this->connector->send(new ReadHtpasswdUser($id));
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
