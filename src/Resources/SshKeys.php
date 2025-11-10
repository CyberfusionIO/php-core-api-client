<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\SshKeyCreatePrivateRequest;
use Cyberfusion\CoreApi\Models\SshKeyCreatePublicRequest;
use Cyberfusion\CoreApi\Models\SshKeysSearchRequest;
use Cyberfusion\CoreApi\Requests\SshKeys\CreatePrivateSshKey;
use Cyberfusion\CoreApi\Requests\SshKeys\CreatePublicSshKey;
use Cyberfusion\CoreApi\Requests\SshKeys\DeleteSshKey;
use Cyberfusion\CoreApi\Requests\SshKeys\ListSshKeys;
use Cyberfusion\CoreApi\Requests\SshKeys\ReadSshKey;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class SshKeys extends CoreApiResource
{
    public function createPublicSshKey(SshKeyCreatePublicRequest $sshKeyCreatePublicRequest): Response
    {
        return $this->connector->send(new CreatePublicSshKey($sshKeyCreatePublicRequest));
    }

    public function createPrivateSshKey(SshKeyCreatePrivateRequest $sshKeyCreatePrivateRequest): Response
    {
        return $this->connector->send(new CreatePrivateSshKey($sshKeyCreatePrivateRequest));
    }

    public function listSshKeys(?SshKeysSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListSshKeys($includeFilters, $includes));
    }

    public function readSshKey(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadSshKey($id, $includes));
    }

    public function deleteSshKey(int $id): Response
    {
        return $this->connector->send(new DeleteSshKey($id));
    }
}
