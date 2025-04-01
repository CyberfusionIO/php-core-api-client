<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\SSHKeyCreatePrivateRequest;
use Cyberfusion\CoreApi\Models\SSHKeyCreatePublicRequest;
use Cyberfusion\CoreApi\Requests\SSHKeys\CreatePrivateSSHKey;
use Cyberfusion\CoreApi\Requests\SSHKeys\CreatePublicSSHKey;
use Cyberfusion\CoreApi\Requests\SSHKeys\DeleteSSHKey;
use Cyberfusion\CoreApi\Requests\SSHKeys\ListSSHKeys;
use Cyberfusion\CoreApi\Requests\SSHKeys\ReadSSHKey;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class SSHKeys extends BaseResource
{
    public function createPublicSSHKey(SSHKeyCreatePublicRequest $sSHKeyCreatePublicRequest): Response
    {
        return $this->connector->send(new CreatePublicSSHKey($sSHKeyCreatePublicRequest));
    }

    public function createPrivateSSHKey(SSHKeyCreatePrivateRequest $sSHKeyCreatePrivateRequest): Response
    {
        return $this->connector->send(new CreatePrivateSSHKey($sSHKeyCreatePrivateRequest));
    }

    public function listSSHKeys(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListSSHKeys($skip, $limit, $filter, $sort));
    }

    public function readSSHKey(int $id): Response
    {
        return $this->connector->send(new ReadSSHKey($id));
    }

    public function deleteSSHKey(int $id): Response
    {
        return $this->connector->send(new DeleteSSHKey($id));
    }
}
