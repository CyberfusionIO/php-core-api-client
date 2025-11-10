<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\FpmPoolCreateRequest;
use Cyberfusion\CoreApi\Models\FpmPoolUpdateRequest;
use Cyberfusion\CoreApi\Models\FpmPoolsSearchRequest;
use Cyberfusion\CoreApi\Requests\FpmPools\CreateFpmPool;
use Cyberfusion\CoreApi\Requests\FpmPools\DeleteFpmPool;
use Cyberfusion\CoreApi\Requests\FpmPools\GetFpmPoolStatus;
use Cyberfusion\CoreApi\Requests\FpmPools\ListFpmPools;
use Cyberfusion\CoreApi\Requests\FpmPools\ReadFpmPool;
use Cyberfusion\CoreApi\Requests\FpmPools\ReloadFpmPool;
use Cyberfusion\CoreApi\Requests\FpmPools\RestartFpmPool;
use Cyberfusion\CoreApi\Requests\FpmPools\UpdateFpmPool;
use Cyberfusion\CoreApi\Requests\FpmPools\UpdateFpmPoolVersion;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class FpmPools extends CoreApiResource
{
    public function createFpmPool(FpmPoolCreateRequest $fpmPoolCreateRequest): Response
    {
        return $this->connector->send(new CreateFpmPool($fpmPoolCreateRequest));
    }

    public function listFpmPools(?FpmPoolsSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListFpmPools($includeFilters, $includes));
    }

    public function readFpmPool(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadFpmPool($id, $includes));
    }

    public function updateFpmPool(int $id, FpmPoolUpdateRequest $fpmPoolUpdateRequest): Response
    {
        return $this->connector->send(new UpdateFpmPool($id, $fpmPoolUpdateRequest));
    }

    public function deleteFpmPool(int $id): Response
    {
        return $this->connector->send(new DeleteFpmPool($id));
    }

    public function restartFpmPool(int $id, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new RestartFpmPool($id, $callbackUrl));
    }

    public function reloadFpmPool(int $id, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new ReloadFpmPool($id, $callbackUrl));
    }

    public function getFpmPoolStatus(int $id): Response
    {
        return $this->connector->send(new GetFpmPoolStatus($id));
    }

    public function updateFpmPoolVersion(int $id, string $version, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new UpdateFpmPoolVersion($id, $version, $callbackUrl));
    }
}
