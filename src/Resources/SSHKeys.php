<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\SSHKeyCreatePrivateRequest;
use Cyberfusion\CoreApi\Models\SSHKeyCreatePublicRequest;
use Cyberfusion\CoreApi\Models\SshKeysSearchRequest;
use Cyberfusion\CoreApi\Requests\SSHKeys\CreatePrivateSSHKey;
use Cyberfusion\CoreApi\Requests\SSHKeys\CreatePublicSSHKey;
use Cyberfusion\CoreApi\Requests\SSHKeys\DeleteSSHKey;
use Cyberfusion\CoreApi\Requests\SSHKeys\ListSSHKeys;
use Cyberfusion\CoreApi\Requests\SSHKeys\ReadSSHKey;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class SSHKeys extends CoreApiResource
{
    public function createPublicSSHKey(SSHKeyCreatePublicRequest $sSHKeyCreatePublicRequest): Response
    {
        return $this->connector->send(new CreatePublicSSHKey($sSHKeyCreatePublicRequest));
    }

    public function createPrivateSSHKey(SSHKeyCreatePrivateRequest $sSHKeyCreatePrivateRequest): Response
    {
        return $this->connector->send(new CreatePrivateSSHKey($sSHKeyCreatePrivateRequest));
    }

    public function listSSHKeys(?SshKeysSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListSSHKeys($includeFilters, $includes));
    }

    public function readSSHKey(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadSSHKey($id, $includes));
    }

    public function deleteSSHKey(int $id): Response
    {
        return $this->connector->send(new DeleteSSHKey($id));
    }
}
