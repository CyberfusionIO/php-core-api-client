<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\FtpUserCreateRequest;
use Cyberfusion\CoreApi\Models\FtpUserUpdateRequest;
use Cyberfusion\CoreApi\Models\FtpUsersSearchRequest;
use Cyberfusion\CoreApi\Models\TemporaryFtpUserCreateRequest;
use Cyberfusion\CoreApi\Requests\FtpUsers\CreateFtpUser;
use Cyberfusion\CoreApi\Requests\FtpUsers\CreateTemporaryFtpUser;
use Cyberfusion\CoreApi\Requests\FtpUsers\DeleteFtpUser;
use Cyberfusion\CoreApi\Requests\FtpUsers\ListFtpUsers;
use Cyberfusion\CoreApi\Requests\FtpUsers\ReadFtpUser;
use Cyberfusion\CoreApi\Requests\FtpUsers\UpdateFtpUser;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class FtpUsers extends CoreApiResource
{
    public function createFtpUser(FtpUserCreateRequest $ftpUserCreateRequest): Response
    {
        return $this->connector->send(new CreateFtpUser($ftpUserCreateRequest));
    }

    public function listFtpUsers(?FtpUsersSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListFtpUsers($includeFilters, $includes));
    }

    public function readFtpUser(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadFtpUser($id, $includes));
    }

    public function updateFtpUser(int $id, FtpUserUpdateRequest $ftpUserUpdateRequest): Response
    {
        return $this->connector->send(new UpdateFtpUser($id, $ftpUserUpdateRequest));
    }

    public function deleteFtpUser(int $id): Response
    {
        return $this->connector->send(new DeleteFtpUser($id));
    }

    public function createTemporaryFtpUser(TemporaryFtpUserCreateRequest $temporaryFtpUserCreateRequest): Response
    {
        return $this->connector->send(new CreateTemporaryFtpUser($temporaryFtpUserCreateRequest));
    }
}
