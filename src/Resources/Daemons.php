<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Enums\LogSortOrderEnum;
use Cyberfusion\CoreApi\Models\DaemonCreateRequest;
use Cyberfusion\CoreApi\Models\DaemonUpdateRequest;
use Cyberfusion\CoreApi\Models\DaemonsSearchRequest;
use Cyberfusion\CoreApi\Requests\Daemons\CreateDaemon;
use Cyberfusion\CoreApi\Requests\Daemons\DeleteDaemon;
use Cyberfusion\CoreApi\Requests\Daemons\ListDaemons;
use Cyberfusion\CoreApi\Requests\Daemons\ListLogs;
use Cyberfusion\CoreApi\Requests\Daemons\ReadDaemon;
use Cyberfusion\CoreApi\Requests\Daemons\RestartDaemon;
use Cyberfusion\CoreApi\Requests\Daemons\UpdateDaemon;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class Daemons extends CoreApiResource
{
    public function createDaemon(DaemonCreateRequest $daemonCreateRequest): Response
    {
        return $this->connector->send(new CreateDaemon($daemonCreateRequest));
    }

    public function listDaemons(?DaemonsSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListDaemons($includeFilters));
    }

    public function readDaemon(int $id): Response
    {
        return $this->connector->send(new ReadDaemon($id));
    }

    public function updateDaemon(int $id, DaemonUpdateRequest $daemonUpdateRequest): Response
    {
        return $this->connector->send(new UpdateDaemon($id, $daemonUpdateRequest));
    }

    public function deleteDaemon(int $id): Response
    {
        return $this->connector->send(new DeleteDaemon($id));
    }

    public function listLogs(
        int $id,
        ?string $timestamp = null,
        ?LogSortOrderEnum $sort = null,
        ?int $limit = null,
    ): Response {
        return $this->connector->send(new ListLogs($id, $timestamp, $sort, $limit));
    }

    public function restartDaemon(int $id, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new RestartDaemon($id, $callbackUrl));
    }
}
