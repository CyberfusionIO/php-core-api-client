<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\HAProxyListenCreateRequest;
use Cyberfusion\CoreApi\Requests\HAProxyListens\CreateHAProxyListen;
use Cyberfusion\CoreApi\Requests\HAProxyListens\DeleteHAProxyListen;
use Cyberfusion\CoreApi\Requests\HAProxyListens\ListHAProxyListens;
use Cyberfusion\CoreApi\Requests\HAProxyListens\ReadHAProxyListen;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class HAProxyListens extends BaseResource
{
    public function createHAProxyListen(HAProxyListenCreateRequest $hAProxyListenCreateRequest): Response
    {
        return $this->connector->send(new CreateHAProxyListen($hAProxyListenCreateRequest));
    }

    public function listHAProxyListens(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListHAProxyListens($skip, $limit, $filter, $sort));
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
