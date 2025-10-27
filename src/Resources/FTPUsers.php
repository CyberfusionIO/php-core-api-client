<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\FTPUserCreateRequest;
use Cyberfusion\CoreApi\Models\FTPUserUpdateRequest;
use Cyberfusion\CoreApi\Models\FtpUsersSearchRequest;
use Cyberfusion\CoreApi\Models\TemporaryFTPUserCreateRequest;
use Cyberfusion\CoreApi\Requests\FTPUsers\CreateFTPUser;
use Cyberfusion\CoreApi\Requests\FTPUsers\CreateTemporaryFTPUser;
use Cyberfusion\CoreApi\Requests\FTPUsers\DeleteFTPUser;
use Cyberfusion\CoreApi\Requests\FTPUsers\ListFTPUsers;
use Cyberfusion\CoreApi\Requests\FTPUsers\ReadFTPUser;
use Cyberfusion\CoreApi\Requests\FTPUsers\UpdateFTPUser;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class FTPUsers extends CoreApiResource
{
    public function createFTPUser(FTPUserCreateRequest $fTPUserCreateRequest): Response
    {
        return $this->connector->send(new CreateFTPUser($fTPUserCreateRequest));
    }

    public function listFTPUsers(?FtpUsersSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListFTPUsers($includeFilters));
    }

    public function readFTPUser(int $id): Response
    {
        return $this->connector->send(new ReadFTPUser($id));
    }

    public function updateFTPUser(int $id, FTPUserUpdateRequest $fTPUserUpdateRequest): Response
    {
        return $this->connector->send(new UpdateFTPUser($id, $fTPUserUpdateRequest));
    }

    public function deleteFTPUser(int $id): Response
    {
        return $this->connector->send(new DeleteFTPUser($id));
    }

    public function createTemporaryFTPUser(TemporaryFTPUserCreateRequest $temporaryFTPUserCreateRequest): Response
    {
        return $this->connector->send(new CreateTemporaryFTPUser($temporaryFTPUserCreateRequest));
    }
}
