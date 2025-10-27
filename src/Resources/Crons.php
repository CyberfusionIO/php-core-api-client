<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\CronCreateRequest;
use Cyberfusion\CoreApi\Models\CronUpdateRequest;
use Cyberfusion\CoreApi\Models\CronsSearchRequest;
use Cyberfusion\CoreApi\Requests\Crons\CreateCron;
use Cyberfusion\CoreApi\Requests\Crons\DeleteCron;
use Cyberfusion\CoreApi\Requests\Crons\ListCrons;
use Cyberfusion\CoreApi\Requests\Crons\ReadCron;
use Cyberfusion\CoreApi\Requests\Crons\UpdateCron;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class Crons extends CoreApiResource
{
    public function createCron(CronCreateRequest $cronCreateRequest): Response
    {
        return $this->connector->send(new CreateCron($cronCreateRequest));
    }

    public function listCrons(?CronsSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListCrons($includeFilters));
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
