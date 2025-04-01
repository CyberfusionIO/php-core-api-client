<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Requests\TaskCollections\ListTaskCollectionResults;
use Cyberfusion\CoreApi\Requests\TaskCollections\RetryTaskCollection;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class TaskCollections extends BaseResource
{
    public function listTaskCollectionResults(string $uuid): Response
    {
        return $this->connector->send(new ListTaskCollectionResults($uuid));
    }

    public function retryTaskCollection(string $uuid, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new RetryTaskCollection($uuid, $callbackUrl));
    }
}
