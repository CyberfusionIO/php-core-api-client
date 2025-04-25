<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\RedisEvictionPolicyEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class RedisInstanceUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

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
            ->setPassword(Arr::get($data, 'password'))
            ->setMemoryLimit(Arr::get($data, 'memory_limit'))
            ->setMaxDatabases(Arr::get($data, 'max_databases'))
            ->setEvictionPolicy(Arr::get($data, 'eviction_policy') !== null ? RedisEvictionPolicyEnum::tryFrom(Arr::get($data, 'eviction_policy')) : null);
    }
}
