<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\DaemonCreateRequest;
use Cyberfusion\CoreApi\Models\DaemonUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\DaemonUpdateRequest;
use Cyberfusion\CoreApi\Requests\Daemons\CreateDaemon;
use Cyberfusion\CoreApi\Requests\Daemons\DeleteDaemon;
use Cyberfusion\CoreApi\Requests\Daemons\DeprecatedUpdateDaemon;
use Cyberfusion\CoreApi\Requests\Daemons\ListDaemons;
use Cyberfusion\CoreApi\Requests\Daemons\ReadDaemon;
use Cyberfusion\CoreApi\Requests\Daemons\UpdateDaemon;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Daemons extends BaseResource
{
    public function createDaemon(DaemonCreateRequest $daemonCreateRequest): Response
    {
        return $this->connector->send(new CreateDaemon($daemonCreateRequest));
    }

    public function listDaemons(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListDaemons($skip, $limit, $filter, $sort));
    }

    public function readDaemon(int $id): Response
    {
        return $this->connector->send(new ReadDaemon($id));
    }

    public function deprecatedUpdateDaemon(
        int $id,
        DaemonUpdateDeprecatedRequest $daemonUpdateDeprecatedRequest,
    ): Response {
        return $this->connector->send(new DeprecatedUpdateDaemon($id, $daemonUpdateDeprecatedRequest));
    }

    public function updateDaemon(int $id, DaemonUpdateRequest $daemonUpdateRequest): Response
    {
        return $this->connector->send(new UpdateDaemon($id, $daemonUpdateRequest));
    }

    public function deleteDaemon(int $id): Response
    {
        return $this->connector->send(new DeleteDaemon($id));
    }
}
