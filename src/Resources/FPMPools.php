<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\FPMPoolCreateRequest;
use Cyberfusion\CoreApi\Models\FPMPoolUpdateRequest;
use Cyberfusion\CoreApi\Requests\FPMPools\CreateFPMPool;
use Cyberfusion\CoreApi\Requests\FPMPools\DeleteFPMPool;
use Cyberfusion\CoreApi\Requests\FPMPools\ListFPMPools;
use Cyberfusion\CoreApi\Requests\FPMPools\ReadFPMPool;
use Cyberfusion\CoreApi\Requests\FPMPools\ReloadFPMPool;
use Cyberfusion\CoreApi\Requests\FPMPools\RestartFPMPool;
use Cyberfusion\CoreApi\Requests\FPMPools\UpdateFPMPool;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class FPMPools extends BaseResource
{
    public function createFPMPool(FPMPoolCreateRequest $fPMPoolCreateRequest): Response
    {
        return $this->connector->send(new CreateFPMPool($fPMPoolCreateRequest));
    }

    public function listFPMPools(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListFPMPools($skip, $limit, $filter, $sort));
    }

    public function readFPMPool(int $id): Response
    {
        return $this->connector->send(new ReadFPMPool($id));
    }

    public function updateFPMPool(int $id, FPMPoolUpdateRequest $fPMPoolUpdateRequest): Response
    {
        return $this->connector->send(new UpdateFPMPool($id, $fPMPoolUpdateRequest));
    }

    public function deleteFPMPool(int $id): Response
    {
        return $this->connector->send(new DeleteFPMPool($id));
    }

    public function restartFPMPool(int $id, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new RestartFPMPool($id, $callbackUrl));
    }

    public function reloadFPMPool(int $id, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new ReloadFPMPool($id, $callbackUrl));
    }
}
