<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Requests\Tombstones\ListTombstones;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Tombstones extends BaseResource
{
    public function listTombstones(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListTombstones($skip, $limit, $filter, $sort));
    }
}
