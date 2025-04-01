<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\RootSSHKeyCreatePrivateRequest;
use Cyberfusion\CoreApi\Models\RootSSHKeyCreatePublicRequest;
use Cyberfusion\CoreApi\Requests\RootSSHKeys\CreatePrivateRootSSHKey;
use Cyberfusion\CoreApi\Requests\RootSSHKeys\CreatePublicRootSSHKey;
use Cyberfusion\CoreApi\Requests\RootSSHKeys\DeleteRootSSHKey;
use Cyberfusion\CoreApi\Requests\RootSSHKeys\ListRootSSHKeys;
use Cyberfusion\CoreApi\Requests\RootSSHKeys\ReadRootSSHKey;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class RootSSHKeys extends BaseResource
{
    public function createPublicRootSSHKey(RootSSHKeyCreatePublicRequest $rootSSHKeyCreatePublicRequest): Response
    {
        return $this->connector->send(new CreatePublicRootSSHKey($rootSSHKeyCreatePublicRequest));
    }

    public function createPrivateRootSSHKey(RootSSHKeyCreatePrivateRequest $rootSSHKeyCreatePrivateRequest): Response
    {
        return $this->connector->send(new CreatePrivateRootSSHKey($rootSSHKeyCreatePrivateRequest));
    }

    public function listRootSSHKeys(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListRootSSHKeys($skip, $limit, $filter, $sort));
    }

    public function readRootSSHKey(int $id): Response
    {
        return $this->connector->send(new ReadRootSSHKey($id));
    }

    public function deleteRootSSHKey(int $id): Response
    {
        return $this->connector->send(new DeleteRootSSHKey($id));
    }
}
