<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FpmPoolCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $name, string $version, int $unixUserId)
    {
        $this->setName($name);
        $this->setVersion($version);
        $this->setUnixUserId($unixUserId);
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(string $name): self
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

    public function setVersion(string $version): self
    {
        $this->setAttribute('version', $version);
        return $this;
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(int $unixUserId): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getMaxChildren(): int
    {
        return $this->getAttribute('max_children');
    }

    public function setMaxChildren(int $maxChildren): self
    {
        $this->setAttribute('max_children', $maxChildren);
        return $this;
    }

    public function getMaxRequests(): int
    {
        return $this->getAttribute('max_requests');
    }

    public function setMaxRequests(int $maxRequests): self
    {
        $this->setAttribute('max_requests', $maxRequests);
        return $this;
    }

    public function getProcessIdleTimeout(): int
    {
        return $this->getAttribute('process_idle_timeout');
    }

    public function setProcessIdleTimeout(int $processIdleTimeout): self
    {
        $this->setAttribute('process_idle_timeout', $processIdleTimeout);
        return $this;
    }

    public function getCpuLimit(): int|null
    {
        return $this->getAttribute('cpu_limit');
    }

    public function setCpuLimit(?int $cpuLimit): self
    {
        $this->setAttribute('cpu_limit', $cpuLimit);
        return $this;
    }

    public function getLogSlowRequestsThreshold(): int|null
    {
        return $this->getAttribute('log_slow_requests_threshold');
    }

    public function setLogSlowRequestsThreshold(?int $logSlowRequestsThreshold): self
    {
        $this->setAttribute('log_slow_requests_threshold', $logSlowRequestsThreshold);
        return $this;
    }

    public function getIsNamespaced(): bool
    {
        return $this->getAttribute('is_namespaced');
    }

    public function setIsNamespaced(bool $isNamespaced): self
    {
        $this->setAttribute('is_namespaced', $isNamespaced);
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

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            version: Arr::get($data, 'version'),
            unixUserId: Arr::get($data, 'unix_user_id'),
        ))
            ->when(Arr::has($data, 'max_children'), fn (self $model) => $model->setMaxChildren(Arr::get($data, 'max_children', 25)))
            ->when(Arr::has($data, 'max_requests'), fn (self $model) => $model->setMaxRequests(Arr::get($data, 'max_requests', 20)))
            ->when(Arr::has($data, 'process_idle_timeout'), fn (self $model) => $model->setProcessIdleTimeout(Arr::get($data, 'process_idle_timeout', 10)))
            ->when(Arr::has($data, 'cpu_limit'), fn (self $model) => $model->setCpuLimit(Arr::get($data, 'cpu_limit')))
            ->when(Arr::has($data, 'log_slow_requests_threshold'), fn (self $model) => $model->setLogSlowRequestsThreshold(Arr::get($data, 'log_slow_requests_threshold')))
            ->when(Arr::has($data, 'is_namespaced'), fn (self $model) => $model->setIsNamespaced(Arr::get($data, 'is_namespaced', true)))
            ->when(Arr::has($data, 'memory_limit'), fn (self $model) => $model->setMemoryLimit(Arr::get($data, 'memory_limit')));
    }
}
