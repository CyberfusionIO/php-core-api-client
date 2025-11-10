<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\HaproxyListenCreateRequest;
use Cyberfusion\CoreApi\Models\HaproxyListensSearchRequest;
use Cyberfusion\CoreApi\Requests\HaproxyListens\CreateHaproxyListen;
use Cyberfusion\CoreApi\Requests\HaproxyListens\DeleteHaproxyListen;
use Cyberfusion\CoreApi\Requests\HaproxyListens\ListHaproxyListens;
use Cyberfusion\CoreApi\Requests\HaproxyListens\ReadHaproxyListen;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class HaproxyListens extends CoreApiResource
{
    public function createHaproxyListen(HaproxyListenCreateRequest $haproxyListenCreateRequest): Response
    {
        return $this->connector->send(new CreateHaproxyListen($haproxyListenCreateRequest));
    }

    public function listHaproxyListens(
        ?HaproxyListensSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListHaproxyListens($includeFilters, $includes));
    }

    public function readHaproxyListen(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadHaproxyListen($id, $includes));
    }

    public function deleteHaproxyListen(int $id): Response
    {
        return $this->connector->send(new DeleteHaproxyListen($id));
    }
}
