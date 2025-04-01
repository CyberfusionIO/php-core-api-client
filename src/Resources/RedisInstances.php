<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\RedisInstanceCreateRequest;
use Cyberfusion\CoreApi\Models\RedisInstanceUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\RedisInstanceUpdateRequest;
use Cyberfusion\CoreApi\Requests\RedisInstances\CreateRedisInstance;
use Cyberfusion\CoreApi\Requests\RedisInstances\DeleteRedisInstance;
use Cyberfusion\CoreApi\Requests\RedisInstances\DeprecatedUpdateRedisInstance;
use Cyberfusion\CoreApi\Requests\RedisInstances\ListRedisInstances;
use Cyberfusion\CoreApi\Requests\RedisInstances\ReadRedisInstance;
use Cyberfusion\CoreApi\Requests\RedisInstances\UpdateRedisInstance;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class RedisInstances extends BaseResource
{
    public function createRedisInstance(RedisInstanceCreateRequest $redisInstanceCreateRequest): Response
    {
        return $this->connector->send(new CreateRedisInstance($redisInstanceCreateRequest));
    }

    public function listRedisInstances(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListRedisInstances($skip, $limit, $filter, $sort));
    }

    public function readRedisInstance(int $id): Response
    {
        return $this->connector->send(new ReadRedisInstance($id));
    }

    public function deprecatedUpdateRedisInstance(
        int $id,
        RedisInstanceUpdateDeprecatedRequest $redisInstanceUpdateDeprecatedRequest,
    ): Response {
        return $this->connector->send(new DeprecatedUpdateRedisInstance($id, $redisInstanceUpdateDeprecatedRequest));
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
