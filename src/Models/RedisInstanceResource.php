<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\RedisEvictionPolicyEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class RedisInstanceResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $port,
        string $name,
        int $clusterId,
        string $password,
        int $memoryLimit,
        int $maxDatabases,
        RedisEvictionPolicyEnum $evictionPolicy,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setPort($port);
        $this->setName($name);
        $this->setClusterId($clusterId);
        $this->setPassword($password);
        $this->setMemoryLimit($memoryLimit);
        $this->setMaxDatabases($maxDatabases);
        $this->setEvictionPolicy($evictionPolicy);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('createdAt');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getPort(): int
    {
        return $this->getAttribute('port');
    }

    public function setPort(?int $port = null): self
    {
        $this->setAttribute('port', $port);
        return $this;
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(?string $name = null): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getPassword(): string
    {
        return $this->getAttribute('password');
    }

    /**
     * @throws ValidationException
     */
    public function setPassword(?string $password = null): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[a-zA-Z0-9]+$/')
            ->assert($password);
        $this->setAttribute('password', $password);
        return $this;
    }

    public function getMemoryLimit(): int
    {
        return $this->getAttribute('memoryLimit');
    }

    public function setMemoryLimit(?int $memoryLimit = null): self
    {
        $this->setAttribute('memory_limit', $memoryLimit);
        return $this;
    }

    public function getMaxDatabases(): int
    {
        return $this->getAttribute('maxDatabases');
    }

    public function setMaxDatabases(?int $maxDatabases = null): self
    {
        $this->setAttribute('max_databases', $maxDatabases);
        return $this;
    }

    public function getEvictionPolicy(): RedisEvictionPolicyEnum
    {
        return $this->getAttribute('evictionPolicy');
    }

    public function setEvictionPolicy(?RedisEvictionPolicyEnum $evictionPolicy = null): self
    {
        $this->setAttribute('eviction_policy', $evictionPolicy);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            port: Arr::get($data, 'port'),
            name: Arr::get($data, 'name'),
            clusterId: Arr::get($data, 'cluster_id'),
            password: Arr::get($data, 'password'),
            memoryLimit: Arr::get($data, 'memory_limit'),
            maxDatabases: Arr::get($data, 'max_databases'),
            evictionPolicy: RedisEvictionPolicyEnum::tryFrom(Arr::get($data, 'eviction_policy')),
        ));
    }
}
