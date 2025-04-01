<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Requests\Sites\ListSites;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Sites extends BaseResource
{
    public function listSites(
        string $baseUrl,
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListSites($baseUrl, $skip, $limit, $filter, $sort));
    }
}
