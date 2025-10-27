<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\TombstonesSearchRequest;
use Cyberfusion\CoreApi\Requests\Tombstones\ListTombstones;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class Tombstones extends CoreApiResource
{
    public function listTombstones(?TombstonesSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListTombstones($includeFilters));
    }
}
