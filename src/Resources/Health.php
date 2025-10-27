<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Requests\Health\ReadHealth;
use Saloon\Http\Response;

class Health extends CoreApiResource
{
    public function readHealth(string $baseUrl): Response
    {
        return $this->connector->send(new ReadHealth($baseUrl));
    }
}
