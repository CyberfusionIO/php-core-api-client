<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Requests\TaskCollections\ListTaskCollectionResults;
use Cyberfusion\CoreApi\Requests\TaskCollections\RetryTaskCollection;
use Saloon\Http\Response;

class TaskCollections extends CoreApiResource
{
    public function listTaskCollectionResults(string $uuid): Response
    {
        return $this->connector->send(new ListTaskCollectionResults($uuid));
    }

    public function retryTaskCollection(string $uuid, ?string $callbackUrl = null, array $includes = []): Response
    {
        return $this->connector->send(new RetryTaskCollection($uuid, $callbackUrl, $includes));
    }
}
