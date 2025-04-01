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

    public function getMaxChildren(): int
    {
        return $this->getAttribute('maxChildren');
    }

    public function setMaxChildren(int $maxChildren): self
    {
        $this->setAttribute('maxChildren', $maxChildren);
        return $this;
    }

    public function getMaxRequests(): int
    {
        return $this->getAttribute('maxRequests');
    }

    public function setMaxRequests(int $maxRequests): self
    {
        $this->setAttribute('maxRequests', $maxRequests);
        return $this;
    }

    public function getProcessIdleTimeout(): int
    {
        return $this->getAttribute('processIdleTimeout');
    }

    public function setProcessIdleTimeout(int $processIdleTimeout): self
    {
        $this->setAttribute('processIdleTimeout', $processIdleTimeout);
        return $this;
    }

    public function getCpuLimit(): int|null
    {
        return $this->getAttribute('cpuLimit');
    }

    public function setCpuLimit(?int $cpuLimit): self
    {
        $this->setAttribute('cpuLimit', $cpuLimit);
        return $this;
    }

    public function getLogSlowRequestsThreshold(): int|null
    {
        return $this->getAttribute('logSlowRequestsThreshold');
    }

    public function setLogSlowRequestsThreshold(?int $logSlowRequestsThreshold): self
    {
        $this->setAttribute('logSlowRequestsThreshold', $logSlowRequestsThreshold);
        return $this;
    }

    public function getIsNamespaced(): bool
    {
        return $this->getAttribute('isNamespaced');
    }

    public function setIsNamespaced(bool $isNamespaced): self
    {
        $this->setAttribute('isNamespaced', $isNamespaced);
        return $this;
    }

    public function getMemoryLimit(): int|null
    {
        return $this->getAttribute('memoryLimit');
    }

    public function setMemoryLimit(?int $memoryLimit): self
    {
        $this->setAttribute('memoryLimit', $memoryLimit);
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
