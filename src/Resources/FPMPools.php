<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\FPMPoolCreateRequest;
use Cyberfusion\CoreApi\Models\FPMPoolUpdateRequest;
use Cyberfusion\CoreApi\Models\FpmPoolsSearchRequest;
use Cyberfusion\CoreApi\Requests\FPMPools\CreateFPMPool;
use Cyberfusion\CoreApi\Requests\FPMPools\DeleteFPMPool;
use Cyberfusion\CoreApi\Requests\FPMPools\GetFPMPoolStatus;
use Cyberfusion\CoreApi\Requests\FPMPools\ListFPMPools;
use Cyberfusion\CoreApi\Requests\FPMPools\ReadFPMPool;
use Cyberfusion\CoreApi\Requests\FPMPools\ReloadFPMPool;
use Cyberfusion\CoreApi\Requests\FPMPools\RestartFPMPool;
use Cyberfusion\CoreApi\Requests\FPMPools\UpdateFPMPool;
use Cyberfusion\CoreApi\Requests\FPMPools\UpdateFPMPoolVersion;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class FPMPools extends CoreApiResource
{
    public function createFPMPool(FPMPoolCreateRequest $fPMPoolCreateRequest): Response
    {
        return $this->connector->send(new CreateFPMPool($fPMPoolCreateRequest));
    }

    public function listFPMPools(?FpmPoolsSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListFPMPools($includeFilters));
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

    public function getFPMPoolStatus(int $id): Response
    {
        return $this->connector->send(new GetFPMPoolStatus($id));
    }

    public function updateFPMPoolVersion(int $id, string $version, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new UpdateFPMPoolVersion($id, $version, $callbackUrl));
    }
}
