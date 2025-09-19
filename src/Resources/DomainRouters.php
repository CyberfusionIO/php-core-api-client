<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\DomainRouterUpdateRequest;
use Cyberfusion\CoreApi\Requests\DomainRouters\ListDomainRouters;
use Cyberfusion\CoreApi\Requests\DomainRouters\UpdateDomainRouter;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class DomainRouters extends BaseResource
{
    public function listDomainRouters(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListDomainRouters($skip, $limit, $filter, $sort));
    }

    public function updateDomainRouter(int $id, DomainRouterUpdateRequest $domainRouterUpdateRequest): Response
    {
        return $this->connector->send(new UpdateDomainRouter($id, $domainRouterUpdateRequest));
    }
}
