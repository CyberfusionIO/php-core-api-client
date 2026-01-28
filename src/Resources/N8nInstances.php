<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\N8nInstanceCreateRequest;
use Cyberfusion\CoreApi\Models\N8nInstanceUpdateRequest;
use Cyberfusion\CoreApi\Models\N8nInstancesSearchRequest;
use Cyberfusion\CoreApi\Requests\N8nInstances\CreateN8nInstance;
use Cyberfusion\CoreApi\Requests\N8nInstances\DeleteN8nInstance;
use Cyberfusion\CoreApi\Requests\N8nInstances\ListN8nInstances;
use Cyberfusion\CoreApi\Requests\N8nInstances\ReadN8nInstance;
use Cyberfusion\CoreApi\Requests\N8nInstances\UpdateN8nInstance;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class N8nInstances extends CoreApiResource
{
    public function createN8nInstance(N8nInstanceCreateRequest $n8nInstanceCreateRequest): Response
    {
        return $this->connector->send(new CreateN8nInstance($n8nInstanceCreateRequest));
    }

    public function listN8nInstances(
        ?N8nInstancesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListN8nInstances($includeFilters, $includes));
    }

    public function readN8nInstance(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadN8nInstance($id, $includes));
    }

    public function updateN8nInstance(int $id, N8nInstanceUpdateRequest $n8nInstanceUpdateRequest): Response
    {
        return $this->connector->send(new UpdateN8nInstance($id, $n8nInstanceUpdateRequest));
    }

    public function deleteN8nInstance(int $id, ?bool $deleteOnCluster = null): Response
    {
        return $this->connector->send(new DeleteN8nInstance($id, $deleteOnCluster));
    }
}
