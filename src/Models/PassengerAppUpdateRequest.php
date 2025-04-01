<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\PassengerEnvironmentEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class PassengerAppUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getEnvironment(): PassengerEnvironmentEnum
    {
        return $this->getAttribute('environment');
    }

    public function setEnvironment(PassengerEnvironmentEnum $environment): self
    {
        $this->setAttribute('environment', $environment);
        return $this;
    }

    public function getEnvironmentVariables(): string
    {
        return $this->getAttribute('environmentVariables');
    }

    public function setEnvironmentVariables(string $environmentVariables): self
    {
        $this->setAttribute('environmentVariables', $environmentVariables);
        return $this;
    }

    public function getMaxPoolSize(): int
    {
        return $this->getAttribute('maxPoolSize');
    }

    public function setMaxPoolSize(int $maxPoolSize): self
    {
        $this->setAttribute('maxPoolSize', $maxPoolSize);
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

    public function getPoolIdleTime(): int
    {
        return $this->getAttribute('poolIdleTime');
    }

    public function setPoolIdleTime(int $poolIdleTime): self
    {
        $this->setAttribute('poolIdleTime', $poolIdleTime);
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

    public function getCpuLimit(): int|null
    {
        return $this->getAttribute('cpuLimit');
    }

    public function setCpuLimit(?int $cpuLimit): self
    {
        $this->setAttribute('cpuLimit', $cpuLimit);
        return $this;
    }

    public function getNodejsVersion(): string|null
    {
        return $this->getAttribute('nodejsVersion');
    }

    public function setNodejsVersion(?string $nodejsVersion): self
    {
        $this->setAttribute('nodejsVersion', $nodejsVersion);
        return $this;
    }

    public function getStartupFile(): string|null
    {
        return $this->getAttribute('startupFile');
    }

    public function setStartupFile(?string $startupFile): self
    {
        $this->setAttribute('startupFile', $startupFile);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setEnvironment(Arr::get($data, 'environment'))
            ->setEnvironmentVariables(Arr::get($data, 'environment_variables'))
            ->setMaxPoolSize(Arr::get($data, 'max_pool_size'))
            ->setMaxRequests(Arr::get($data, 'max_requests'))
            ->setPoolIdleTime(Arr::get($data, 'pool_idle_time'))
            ->setIsNamespaced(Arr::get($data, 'is_namespaced'))
            ->setCpuLimit(Arr::get($data, 'cpu_limit'))
            ->setNodejsVersion(Arr::get($data, 'nodejs_version'))
            ->setStartupFile(Arr::get($data, 'startup_file'));
    }
}
