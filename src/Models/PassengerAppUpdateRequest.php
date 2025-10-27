<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\PassengerEnvironmentEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class PassengerAppUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getEnvironment(): PassengerEnvironmentEnum|null
    {
        return $this->getAttribute('environment');
    }

    public function setEnvironment(?PassengerEnvironmentEnum $environment): self
    {
        $this->setAttribute('environment', $environment);
        return $this;
    }

    public function getEnvironmentVariables(): \ArrayObject|null
    {
        return $this->getAttribute('environment_variables');
    }

    public function setEnvironmentVariables(?\ArrayObject $environmentVariables): self
    {
        $this->setAttribute('environment_variables', $environmentVariables);
        return $this;
    }

    public function getMaxPoolSize(): int|null
    {
        return $this->getAttribute('max_pool_size');
    }

    public function setMaxPoolSize(?int $maxPoolSize): self
    {
        $this->setAttribute('max_pool_size', $maxPoolSize);
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

    public function getPoolIdleTime(): int|null
    {
        return $this->getAttribute('pool_idle_time');
    }

    public function setPoolIdleTime(?int $poolIdleTime): self
    {
        $this->setAttribute('pool_idle_time', $poolIdleTime);
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

    public function getCpuLimit(): int|null
    {
        return $this->getAttribute('cpu_limit');
    }

    public function setCpuLimit(?int $cpuLimit): self
    {
        $this->setAttribute('cpu_limit', $cpuLimit);
        return $this;
    }

    public function getNodejsVersion(): string|null
    {
        return $this->getAttribute('nodejs_version');
    }

    public function setNodejsVersion(?string $nodejsVersion): self
    {
        $this->setAttribute('nodejs_version', $nodejsVersion);
        return $this;
    }

    public function getStartupFile(): string|null
    {
        return $this->getAttribute('startup_file');
    }

    public function setStartupFile(?string $startupFile): self
    {
        $this->setAttribute('startup_file', $startupFile);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'environment'), fn (self $model) => $model->setEnvironment(Arr::get($data, 'environment') !== null ? PassengerEnvironmentEnum::tryFrom(Arr::get($data, 'environment')) : null))
            ->when(Arr::has($data, 'environment_variables'), fn (self $model) => $model->setEnvironmentVariables(Arr::get($data, 'environment_variables')))
            ->when(Arr::has($data, 'max_pool_size'), fn (self $model) => $model->setMaxPoolSize(Arr::get($data, 'max_pool_size')))
            ->when(Arr::has($data, 'max_requests'), fn (self $model) => $model->setMaxRequests(Arr::get($data, 'max_requests')))
            ->when(Arr::has($data, 'pool_idle_time'), fn (self $model) => $model->setPoolIdleTime(Arr::get($data, 'pool_idle_time')))
            ->when(Arr::has($data, 'is_namespaced'), fn (self $model) => $model->setIsNamespaced(Arr::get($data, 'is_namespaced')))
            ->when(Arr::has($data, 'cpu_limit'), fn (self $model) => $model->setCpuLimit(Arr::get($data, 'cpu_limit')))
            ->when(Arr::has($data, 'nodejs_version'), fn (self $model) => $model->setNodejsVersion(Arr::get($data, 'nodejs_version')))
            ->when(Arr::has($data, 'startup_file'), fn (self $model) => $model->setStartupFile(Arr::get($data, 'startup_file')));
    }
}
