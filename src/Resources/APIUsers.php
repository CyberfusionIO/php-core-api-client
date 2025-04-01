<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Requests\APIUsers\ReadClustersChildren;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class APIUsers extends BaseResource
{
    public function readClustersChildren(): Response
    {
        return $this->connector->send(new ReadClustersChildren());
    }
}
