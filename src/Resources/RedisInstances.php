<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\RedisInstanceCreateRequest;
use Cyberfusion\CoreApi\Models\RedisInstanceUpdateRequest;
use Cyberfusion\CoreApi\Models\RedisInstancesSearchRequest;
use Cyberfusion\CoreApi\Requests\RedisInstances\CreateRedisInstance;
use Cyberfusion\CoreApi\Requests\RedisInstances\DeleteRedisInstance;
use Cyberfusion\CoreApi\Requests\RedisInstances\ListRedisInstances;
use Cyberfusion\CoreApi\Requests\RedisInstances\ReadRedisInstance;
use Cyberfusion\CoreApi\Requests\RedisInstances\UpdateRedisInstance;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class RedisInstances extends CoreApiResource
{
    public function createRedisInstance(RedisInstanceCreateRequest $redisInstanceCreateRequest): Response
    {
        return $this->connector->send(new CreateRedisInstance($redisInstanceCreateRequest));
    }

    public function listRedisInstances(
        ?RedisInstancesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListRedisInstances($includeFilters, $includes));
    }

    public function readRedisInstance(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadRedisInstance($id, $includes));
    }

    public function updateRedisInstance(int $id, RedisInstanceUpdateRequest $redisInstanceUpdateRequest): Response
    {
        return $this->connector->send(new UpdateRedisInstance($id, $redisInstanceUpdateRequest));
    }

    public function deleteRedisInstance(int $id, ?bool $deleteOnCluster = null): Response
    {
        return $this->connector->send(new DeleteRedisInstance($id, $deleteOnCluster));
    }
}
