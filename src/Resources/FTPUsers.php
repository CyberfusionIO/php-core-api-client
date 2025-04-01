<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\FTPUserCreateRequest;
use Cyberfusion\CoreApi\Models\FTPUserUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\FTPUserUpdateRequest;
use Cyberfusion\CoreApi\Models\TemporaryFTPUserCreateRequest;
use Cyberfusion\CoreApi\Requests\FTPUsers\CreateFTPUser;
use Cyberfusion\CoreApi\Requests\FTPUsers\CreateTemporaryFTPUser;
use Cyberfusion\CoreApi\Requests\FTPUsers\DeleteFTPUser;
use Cyberfusion\CoreApi\Requests\FTPUsers\DeprecatedUpdateFTPUser;
use Cyberfusion\CoreApi\Requests\FTPUsers\ListFTPUsers;
use Cyberfusion\CoreApi\Requests\FTPUsers\ReadFTPUser;
use Cyberfusion\CoreApi\Requests\FTPUsers\UpdateFTPUser;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class FTPUsers extends BaseResource
{
    public function createFTPUser(FTPUserCreateRequest $fTPUserCreateRequest): Response
    {
        return $this->connector->send(new CreateFTPUser($fTPUserCreateRequest));
    }

    public function listFTPUsers(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListFTPUsers($skip, $limit, $filter, $sort));
    }

    public function readFTPUser(int $id): Response
    {
        return $this->connector->send(new ReadFTPUser($id));
    }

    public function deprecatedUpdateFTPUser(
        int $id,
        FTPUserUpdateDeprecatedRequest $fTPUserUpdateDeprecatedRequest,
    ): Response {
        return $this->connector->send(new DeprecatedUpdateFTPUser($id, $fTPUserUpdateDeprecatedRequest));
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
