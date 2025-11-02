<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\RootSSHKeyCreatePrivateRequest;
use Cyberfusion\CoreApi\Models\RootSSHKeyCreatePublicRequest;
use Cyberfusion\CoreApi\Models\RootSshKeysSearchRequest;
use Cyberfusion\CoreApi\Requests\RootSSHKeys\CreatePrivateRootSSHKey;
use Cyberfusion\CoreApi\Requests\RootSSHKeys\CreatePublicRootSSHKey;
use Cyberfusion\CoreApi\Requests\RootSSHKeys\DeleteRootSSHKey;
use Cyberfusion\CoreApi\Requests\RootSSHKeys\ListRootSSHKeys;
use Cyberfusion\CoreApi\Requests\RootSSHKeys\ReadRootSSHKey;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class RootSSHKeys extends CoreApiResource
{
    public function createPublicRootSSHKey(RootSSHKeyCreatePublicRequest $rootSSHKeyCreatePublicRequest): Response
    {
        return $this->connector->send(new CreatePublicRootSSHKey($rootSSHKeyCreatePublicRequest));
    }

    public function createPrivateRootSSHKey(RootSSHKeyCreatePrivateRequest $rootSSHKeyCreatePrivateRequest): Response
    {
        return $this->connector->send(new CreatePrivateRootSSHKey($rootSSHKeyCreatePrivateRequest));
    }

    public function listRootSSHKeys(?RootSshKeysSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListRootSSHKeys($includeFilters, $includes));
    }

    public function readRootSSHKey(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadRootSSHKey($id, $includes));
    }

    public function deleteRootSSHKey(int $id): Response
    {
        return $this->connector->send(new DeleteRootSSHKey($id));
    }
}
