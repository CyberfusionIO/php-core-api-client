<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Requests\Health\ReadHealth;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Health extends BaseResource
{
    public function readHealth(string $baseUrl): Response
    {
        return $this->connector->send(new ReadHealth($baseUrl));
    }
}
