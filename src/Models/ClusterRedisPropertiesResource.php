<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterRedisPropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $redisPassword,
        int $redisMemoryLimit,
        int $clusterId,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setRedisPassword($redisPassword);
        $this->setRedisMemoryLimit($redisMemoryLimit);
        $this->setClusterId($clusterId);
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
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getRedisPassword(): string
    {
        return $this->getAttribute('redis_password');
    }

    /**
     * @throws ValidationException
     */
    public function setRedisPassword(?string $redisPassword = null): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[a-zA-Z0-9]+$/')
            ->assert($redisPassword);
        $this->setAttribute('redis_password', $redisPassword);
        return $this;
    }

    public function getRedisMemoryLimit(): int
    {
        return $this->getAttribute('redis_memory_limit');
    }

    public function setRedisMemoryLimit(?int $redisMemoryLimit = null): self
    {
        $this->setAttribute('redis_memory_limit', $redisMemoryLimit);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getIncludes(): ClusterRedisPropertiesIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?ClusterRedisPropertiesIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            redisPassword: Arr::get($data, 'redis_password'),
            redisMemoryLimit: Arr::get($data, 'redis_memory_limit'),
            clusterId: Arr::get($data, 'cluster_id'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? ClusterRedisPropertiesIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
