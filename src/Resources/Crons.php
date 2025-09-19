<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\CronCreateRequest;
use Cyberfusion\CoreApi\Models\CronUpdateRequest;
use Cyberfusion\CoreApi\Requests\Crons\CreateCron;
use Cyberfusion\CoreApi\Requests\Crons\DeleteCron;
use Cyberfusion\CoreApi\Requests\Crons\ListCrons;
use Cyberfusion\CoreApi\Requests\Crons\ReadCron;
use Cyberfusion\CoreApi\Requests\Crons\UpdateCron;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Crons extends BaseResource
{
    public function createCron(CronCreateRequest $cronCreateRequest): Response
    {
        return $this->connector->send(new CreateCron($cronCreateRequest));
    }

    public function listCrons(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListCrons($skip, $limit, $filter, $sort));
    }

    public function readCron(int $id): Response
    {
        return $this->connector->send(new ReadCron($id));
    }

    public function updateCron(int $id, CronUpdateRequest $cronUpdateRequest): Response
    {
        return $this->connector->send(new UpdateCron($id, $cronUpdateRequest));
    }

    public function deleteCron(int $id): Response
    {
        return $this->connector->send(new DeleteCron($id));
    }
}
