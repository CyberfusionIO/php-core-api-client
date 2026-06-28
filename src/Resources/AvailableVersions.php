<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Requests\AvailableVersions\ListAvailableNodeJsVersions;
use Cyberfusion\CoreApi\Requests\AvailableVersions\ListAvailablePhpVersions;
use Cyberfusion\CoreApi\Requests\AvailableVersions\ListAvailableWordpressVersions;
use Saloon\Http\Response;

class AvailableVersions extends CoreApiResource
{
    public function listAvailablePhpVersions(array $includes = []): Response
    {
        return $this->connector->send(new ListAvailablePhpVersions($includes));
    }

    public function listAvailableNodeJsVersions(array $includes = []): Response
    {
        return $this->connector->send(new ListAvailableNodeJsVersions($includes));
    }

    public function listAvailableWordpressVersions(array $includes = []): Response
    {
        return $this->connector->send(new ListAvailableWordpressVersions($includes));
    }
}
