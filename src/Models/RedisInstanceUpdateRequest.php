<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\RedisEvictionPolicyEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class RedisInstanceUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getPassword(): string|null
    {
        return $this->getAttribute('password');
    }

    public function setPassword(?string $password): self
    {
        $this->setAttribute('password', $password);
        return $this;
    }

    public function getMemoryLimit(): int|null
    {
        return $this->getAttribute('memory_limit');
    }

    public function setMemoryLimit(?int $memoryLimit): self
    {
        $this->setAttribute('memory_limit', $memoryLimit);
        return $this;
    }

    public function getMaxDatabases(): int|null
    {
        return $this->getAttribute('max_databases');
    }

    public function setMaxDatabases(?int $maxDatabases): self
    {
        $this->setAttribute('max_databases', $maxDatabases);
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
            ->when(Arr::has($data, 'password'), fn (self $model) => $model->setPassword(Arr::get($data, 'password')))
            ->when(Arr::has($data, 'memory_limit'), fn (self $model) => $model->setMemoryLimit(Arr::get($data, 'memory_limit')))
            ->when(Arr::has($data, 'max_databases'), fn (self $model) => $model->setMaxDatabases(Arr::get($data, 'max_databases')))
            ->when(Arr::has($data, 'eviction_policy'), fn (self $model) => $model->setEvictionPolicy(Arr::get($data, 'eviction_policy') !== null ? RedisEvictionPolicyEnum::tryFrom(Arr::get($data, 'eviction_policy')) : null));
    }
}
