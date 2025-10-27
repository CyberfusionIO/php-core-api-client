<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\RegionsSearchRequest;
use Cyberfusion\CoreApi\Requests\Regions\ListRegions;
use Saloon\Http\Response;

class Regions extends CoreApiResource
{
    public function listRegions(string $baseUrl, ?RegionsSearchRequest $includeFilters = null): Response
    {
        return $this->connector->send(new ListRegions($baseUrl, $includeFilters));
    }
}
