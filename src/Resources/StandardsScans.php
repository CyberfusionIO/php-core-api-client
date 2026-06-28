<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\StandardsScansSearchRequest;
use Cyberfusion\CoreApi\Requests\StandardsScans\ListStandardsScans;
use Cyberfusion\CoreApi\Requests\StandardsScans\ReadStandardsScan;
use Cyberfusion\CoreApi\Requests\StandardsScans\ReadStandardsScanResults;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class StandardsScans extends CoreApiResource
{
    public function listStandardsScans(
        ?StandardsScansSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListStandardsScans($includeFilters, $includes));
    }

    public function readStandardsScan(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadStandardsScan($id, $includes));
    }

    public function readStandardsScanResults(int $id): Response
    {
        return $this->connector->send(new ReadStandardsScanResults($id));
    }
}
