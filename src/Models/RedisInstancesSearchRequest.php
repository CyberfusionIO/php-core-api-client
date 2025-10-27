<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\RedisEvictionPolicyEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class RedisInstancesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getPort(): int|null
    {
        return $this->getAttribute('port');
    }

    public function setPort(?int $port): self
    {
        $this->setAttribute('port', $port);
        return $this;
    }

    public function getName(): string|null
    {
        return $this->getAttribute('name');
    }

    public function setName(?string $name): self
    {
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getEvictionPolicy(): RedisEvictionPolicyEnum|null
    {
        return $this->getAttribute('eviction_policy');
    }

    public function setEvictionPolicy(?RedisEvictionPolicyEnum $evictionPolicy): self
    {
        $this->setAttribute('eviction_policy', $evictionPolicy);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'port'), fn (self $model) => $model->setPort(Arr::get($data, 'port')))
            ->when(Arr::has($data, 'name'), fn (self $model) => $model->setName(Arr::get($data, 'name')))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'eviction_policy'), fn (self $model) => $model->setEvictionPolicy(Arr::get($data, 'eviction_policy') !== null ? RedisEvictionPolicyEnum::tryFrom(Arr::get($data, 'eviction_policy')) : null));
    }
}
