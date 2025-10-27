<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\HAProxyListenCreateRequest;
use Cyberfusion\CoreApi\Models\HaproxyListensSearchRequest;
use Cyberfusion\CoreApi\Requests\HAProxyListens\CreateHAProxyListen;
use Cyberfusion\CoreApi\Requests\HAProxyListens\DeleteHAProxyListen;
use Cyberfusion\CoreApi\Requests\HAProxyListens\ListHAProxyListens;
use Cyberfusion\CoreApi\Requests\HAProxyListens\ReadHAProxyListen;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class HAProxyListens extends CoreApiResource
{
    public function createHAProxyListen(HAProxyListenCreateRequest $hAProxyListenCreateRequest): Response
    {
        return $this->connector->send(new CreateHAProxyListen($hAProxyListenCreateRequest));
    }

    public function listHAProxyListens(?HaproxyListensSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListHAProxyListens($includeFilters));
    }

    public function readHAProxyListen(int $id): Response
    {
        return $this->connector->send(new ReadHAProxyListen($id));
    }

    public function deleteHAProxyListen(int $id): Response
    {
        return $this->connector->send(new DeleteHAProxyListen($id));
    }
}
