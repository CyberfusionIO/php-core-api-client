<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\RootSshKeyCreatePrivateRequest;
use Cyberfusion\CoreApi\Models\RootSshKeyCreatePublicRequest;
use Cyberfusion\CoreApi\Models\RootSshKeysSearchRequest;
use Cyberfusion\CoreApi\Requests\RootSshKeys\CreatePrivateRootSshKey;
use Cyberfusion\CoreApi\Requests\RootSshKeys\CreatePublicRootSshKey;
use Cyberfusion\CoreApi\Requests\RootSshKeys\DeleteRootSshKey;
use Cyberfusion\CoreApi\Requests\RootSshKeys\ListRootSshKeys;
use Cyberfusion\CoreApi\Requests\RootSshKeys\ReadRootSshKey;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class RootSshKeys extends CoreApiResource
{
    public function createPublicRootSshKey(RootSshKeyCreatePublicRequest $rootSshKeyCreatePublicRequest): Response
    {
        return $this->connector->send(new CreatePublicRootSshKey($rootSshKeyCreatePublicRequest));
    }

    public function createPrivateRootSshKey(RootSshKeyCreatePrivateRequest $rootSshKeyCreatePrivateRequest): Response
    {
        return $this->connector->send(new CreatePrivateRootSshKey($rootSshKeyCreatePrivateRequest));
    }

    public function listRootSshKeys(?RootSshKeysSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListRootSshKeys($includeFilters, $includes));
    }

    public function readRootSshKey(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadRootSshKey($id, $includes));
    }

    public function deleteRootSshKey(int $id): Response
    {
        return $this->connector->send(new DeleteRootSshKey($id));
    }
}
