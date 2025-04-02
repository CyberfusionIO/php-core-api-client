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

    public function getPassword(): string
    {
        return $this->getAttribute('password');
    }

    /**
     * @throws ValidationException
     */
    public function setPassword(string $password): self
    {
        Validator::optional(Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[a-zA-Z0-9]+$/'))
            ->assert($password);
        $this->setAttribute('password', $password);
        return $this;
    }

    public function getMemoryLimit(): int
    {
        return $this->getAttribute('memoryLimit');
    }

    public function setMemoryLimit(int $memoryLimit): self
    {
        $this->setAttribute('memory_limit', $memoryLimit);
        return $this;
    }

    public function getMaxDatabases(): int
    {
        return $this->getAttribute('maxDatabases');
    }

    public function setMaxDatabases(int $maxDatabases): self
    {
        $this->setAttribute('max_databases', $maxDatabases);
        return $this;
    }

    public function getEvictionPolicy(): RedisEvictionPolicyEnum
    {
        return $this->getAttribute('evictionPolicy');
    }

    public function setEvictionPolicy(RedisEvictionPolicyEnum $evictionPolicy): self
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
            ->setEvictionPolicy(Arr::get($data, 'eviction_policy'));
    }
}
