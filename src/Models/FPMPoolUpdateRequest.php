<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FPMPoolUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getMaxChildren(): int|null
    {
        return $this->getAttribute('max_children');
    }

    public function setMaxChildren(?int $maxChildren): self
    {
        $this->setAttribute('max_children', $maxChildren);
        return $this;
    }

    public function getMaxRequests(): int|null
    {
        return $this->getAttribute('max_requests');
    }

    public function setMaxRequests(?int $maxRequests): self
    {
        $this->setAttribute('max_requests', $maxRequests);
        return $this;
    }

    public function getProcessIdleTimeout(): int|null
    {
        return $this->getAttribute('process_idle_timeout');
    }

    public function setProcessIdleTimeout(?int $processIdleTimeout): self
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

    public function getIsNamespaced(): bool|null
    {
        return $this->getAttribute('is_namespaced');
    }

    public function setIsNamespaced(?bool $isNamespaced): self
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
        ))
            ->setMaxChildren(Arr::get($data, 'max_children'))
            ->setMaxRequests(Arr::get($data, 'max_requests'))
            ->setProcessIdleTimeout(Arr::get($data, 'process_idle_timeout'))
            ->setCpuLimit(Arr::get($data, 'cpu_limit'))
            ->setLogSlowRequestsThreshold(Arr::get($data, 'log_slow_requests_threshold'))
            ->setIsNamespaced(Arr::get($data, 'is_namespaced'))
            ->setMemoryLimit(Arr::get($data, 'memory_limit'));
    }
}
