<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class FPMPoolDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        string $name,
        string $version,
        int $unixUserId,
        int $maxChildren,
        int $maxRequests,
        int $processIdleTimeout,
        bool $isNamespaced,
        ?int $cpuLimit = null,
        ?int $logSlowRequestsThreshold = null,
        ?int $memoryLimit = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setClusterId($clusterId);
        $this->setName($name);
        $this->setVersion($version);
        $this->setUnixUserId($unixUserId);
        $this->setMaxChildren($maxChildren);
        $this->setMaxRequests($maxRequests);
        $this->setProcessIdleTimeout($processIdleTimeout);
        $this->setIsNamespaced($isNamespaced);
        $this->setCpuLimit($cpuLimit);
        $this->setLogSlowRequestsThreshold($logSlowRequestsThreshold);
        $this->setMemoryLimit($memoryLimit);
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

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
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

    public function getVersion(): string
    {
        return $this->getAttribute('version');
    }

    public function setVersion(?string $version = null): self
    {
        $this->setAttribute('version', $version);
        return $this;
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unixUserId');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getMaxChildren(): int
    {
        return $this->getAttribute('maxChildren');
    }

    public function setMaxChildren(?int $maxChildren = null): self
    {
        $this->setAttribute('max_children', $maxChildren);
        return $this;
    }

    public function getMaxRequests(): int
    {
        return $this->getAttribute('maxRequests');
    }

    public function setMaxRequests(?int $maxRequests = null): self
    {
        $this->setAttribute('max_requests', $maxRequests);
        return $this;
    }

    public function getProcessIdleTimeout(): int
    {
        return $this->getAttribute('processIdleTimeout');
    }

    public function setProcessIdleTimeout(?int $processIdleTimeout = null): self
    {
        $this->setAttribute('process_idle_timeout', $processIdleTimeout);
        return $this;
    }

    public function getCpuLimit(): int|null
    {
        return $this->getAttribute('cpuLimit');
    }

    public function setCpuLimit(?int $cpuLimit = null): self
    {
        $this->setAttribute('cpu_limit', $cpuLimit);
        return $this;
    }

    public function getLogSlowRequestsThreshold(): int|null
    {
        return $this->getAttribute('logSlowRequestsThreshold');
    }

    public function setLogSlowRequestsThreshold(?int $logSlowRequestsThreshold = null): self
    {
        $this->setAttribute('log_slow_requests_threshold', $logSlowRequestsThreshold);
        return $this;
    }

    public function getIsNamespaced(): bool
    {
        return $this->getAttribute('isNamespaced');
    }

    public function setIsNamespaced(?bool $isNamespaced = null): self
    {
        $this->setAttribute('is_namespaced', $isNamespaced);
        return $this;
    }

    public function getMemoryLimit(): int|null
    {
        return $this->getAttribute('memoryLimit');
    }

    public function setMemoryLimit(?int $memoryLimit = null): self
    {
        $this->setAttribute('memory_limit', $memoryLimit);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            clusterId: Arr::get($data, 'cluster_id'),
            name: Arr::get($data, 'name'),
            version: Arr::get($data, 'version'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            maxChildren: Arr::get($data, 'max_children'),
            maxRequests: Arr::get($data, 'max_requests'),
            processIdleTimeout: Arr::get($data, 'process_idle_timeout'),
            isNamespaced: Arr::get($data, 'is_namespaced'),
            cpuLimit: Arr::get($data, 'cpu_limit'),
            logSlowRequestsThreshold: Arr::get($data, 'log_slow_requests_threshold'),
            memoryLimit: Arr::get($data, 'memory_limit'),
        ));
    }
}
