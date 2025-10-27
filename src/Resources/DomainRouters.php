<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\DomainRouterUpdateRequest;
use Cyberfusion\CoreApi\Models\DomainRoutersSearchRequest;
use Cyberfusion\CoreApi\Requests\DomainRouters\ListDomainRouters;
use Cyberfusion\CoreApi\Requests\DomainRouters\UpdateDomainRouter;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class DomainRouters extends CoreApiResource
{
    public function listDomainRouters(?DomainRoutersSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListDomainRouters($includeFilters));
    }

    public function updateDomainRouter(int $id, DomainRouterUpdateRequest $domainRouterUpdateRequest): Response
    {
        return $this->connector->send(new UpdateDomainRouter($id, $domainRouterUpdateRequest));
    }
}
