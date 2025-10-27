<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\PassengerAppTypeEnum;
use Cyberfusion\CoreApi\Enums\PassengerEnvironmentEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class PassengerAppsSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getPort(): int|null
    {
        return $this->getAttribute('port');
    }

    public function setPort(?int $port): self
    {
        $this->setAttribute('port', $port);
        return $this;
    }

    public function getAppType(): PassengerAppTypeEnum|null
    {
        return $this->getAttribute('app_type');
    }

    public function setAppType(?PassengerAppTypeEnum $appType): self
    {
        $this->setAttribute('app_type', $appType);
        return $this;
    }

    public function getName(): string|null
    {
        return $this->getAttribute('name');
    }

    public function setName(?string $name): self
    {
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getUnixUserId(): int|null
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(?int $unixUserId): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getEnvironment(): PassengerEnvironmentEnum|null
    {
        return $this->getAttribute('environment');
    }

    public function setEnvironment(?PassengerEnvironmentEnum $environment): self
    {
        $this->setAttribute('environment', $environment);
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

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'port'), fn (self $model) => $model->setPort(Arr::get($data, 'port')))
            ->when(Arr::has($data, 'app_type'), fn (self $model) => $model->setAppType(Arr::get($data, 'app_type') !== null ? PassengerAppTypeEnum::tryFrom(Arr::get($data, 'app_type')) : null))
            ->when(Arr::has($data, 'name'), fn (self $model) => $model->setName(Arr::get($data, 'name')))
            ->when(Arr::has($data, 'unix_user_id'), fn (self $model) => $model->setUnixUserId(Arr::get($data, 'unix_user_id')))
            ->when(Arr::has($data, 'environment'), fn (self $model) => $model->setEnvironment(Arr::get($data, 'environment') !== null ? PassengerEnvironmentEnum::tryFrom(Arr::get($data, 'environment')) : null))
            ->when(Arr::has($data, 'max_pool_size'), fn (self $model) => $model->setMaxPoolSize(Arr::get($data, 'max_pool_size')))
            ->when(Arr::has($data, 'is_namespaced'), fn (self $model) => $model->setIsNamespaced(Arr::get($data, 'is_namespaced')))
            ->when(Arr::has($data, 'cpu_limit'), fn (self $model) => $model->setCpuLimit(Arr::get($data, 'cpu_limit')))
            ->when(Arr::has($data, 'nodejs_version'), fn (self $model) => $model->setNodejsVersion(Arr::get($data, 'nodejs_version')));
    }
}
