<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\PassengerAppTypeEnum;
use Cyberfusion\CoreApi\Enums\PassengerEnvironmentEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class PassengerAppDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        int $port,
        PassengerAppTypeEnum $appType,
        string $name,
        string $appRoot,
        int $unixUserId,
        PassengerEnvironmentEnum $environment,
        string $environmentVariables,
        int $maxPoolSize,
        int $maxRequests,
        int $poolIdleTime,
        bool $isNamespaced,
        ?int $cpuLimit = null,
        ?string $nodejsVersion = null,
        ?string $startupFile = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setClusterId($clusterId);
        $this->setPort($port);
        $this->setAppType($appType);
        $this->setName($name);
        $this->setAppRoot($appRoot);
        $this->setUnixUserId($unixUserId);
        $this->setEnvironment($environment);
        $this->setEnvironmentVariables($environmentVariables);
        $this->setMaxPoolSize($maxPoolSize);
        $this->setMaxRequests($maxRequests);
        $this->setPoolIdleTime($poolIdleTime);
        $this->setIsNamespaced($isNamespaced);
        $this->setCpuLimit($cpuLimit);
        $this->setNodejsVersion($nodejsVersion);
        $this->setStartupFile($startupFile);
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
        $this->setAttribute('createdAt', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updatedAt', $updatedAt);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('clusterId', $clusterId);
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

    public function getAppType(): PassengerAppTypeEnum
    {
        return $this->getAttribute('appType');
    }

    public function setAppType(?PassengerAppTypeEnum $appType = null): self
    {
        $this->setAttribute('appType', $appType);
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

    public function getAppRoot(): string
    {
        return $this->getAttribute('appRoot');
    }

    public function setAppRoot(?string $appRoot = null): self
    {
        $this->setAttribute('appRoot', $appRoot);
        return $this;
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unixUserId');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unixUserId', $unixUserId);
        return $this;
    }

    public function getEnvironment(): PassengerEnvironmentEnum
    {
        return $this->getAttribute('environment');
    }

    public function setEnvironment(?PassengerEnvironmentEnum $environment = null): self
    {
        $this->setAttribute('environment', $environment);
        return $this;
    }

    public function getEnvironmentVariables(): string
    {
        return $this->getAttribute('environmentVariables');
    }

    public function setEnvironmentVariables(?string $environmentVariables = null): self
    {
        $this->setAttribute('environmentVariables', $environmentVariables);
        return $this;
    }

    public function getMaxPoolSize(): int
    {
        return $this->getAttribute('maxPoolSize');
    }

    public function setMaxPoolSize(?int $maxPoolSize = null): self
    {
        $this->setAttribute('maxPoolSize', $maxPoolSize);
        return $this;
    }

    public function getMaxRequests(): int
    {
        return $this->getAttribute('maxRequests');
    }

    public function setMaxRequests(?int $maxRequests = null): self
    {
        $this->setAttribute('maxRequests', $maxRequests);
        return $this;
    }

    public function getPoolIdleTime(): int
    {
        return $this->getAttribute('poolIdleTime');
    }

    public function setPoolIdleTime(?int $poolIdleTime = null): self
    {
        $this->setAttribute('poolIdleTime', $poolIdleTime);
        return $this;
    }

    public function getIsNamespaced(): bool
    {
        return $this->getAttribute('isNamespaced');
    }

    public function setIsNamespaced(?bool $isNamespaced = null): self
    {
        $this->setAttribute('isNamespaced', $isNamespaced);
        return $this;
    }

    public function getCpuLimit(): int|null
    {
        return $this->getAttribute('cpuLimit');
    }

    public function setCpuLimit(?int $cpuLimit = null): self
    {
        $this->setAttribute('cpuLimit', $cpuLimit);
        return $this;
    }

    public function getNodejsVersion(): string|null
    {
        return $this->getAttribute('nodejsVersion');
    }

    public function setNodejsVersion(?string $nodejsVersion = null): self
    {
        $this->setAttribute('nodejsVersion', $nodejsVersion);
        return $this;
    }

    public function getStartupFile(): string|null
    {
        return $this->getAttribute('startupFile');
    }

    public function setStartupFile(?string $startupFile = null): self
    {
        $this->setAttribute('startupFile', $startupFile);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            clusterId: Arr::get($data, 'cluster_id'),
            port: Arr::get($data, 'port'),
            appType: PassengerAppTypeEnum::tryFrom(Arr::get($data, 'app_type')),
            name: Arr::get($data, 'name'),
            appRoot: Arr::get($data, 'app_root'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            environment: PassengerEnvironmentEnum::tryFrom(Arr::get($data, 'environment')),
            environmentVariables: Arr::get($data, 'environment_variables'),
            maxPoolSize: Arr::get($data, 'max_pool_size'),
            maxRequests: Arr::get($data, 'max_requests'),
            poolIdleTime: Arr::get($data, 'pool_idle_time'),
            isNamespaced: Arr::get($data, 'is_namespaced'),
            cpuLimit: Arr::get($data, 'cpu_limit'),
            nodejsVersion: Arr::get($data, 'nodejs_version'),
            startupFile: Arr::get($data, 'startup_file'),
        ));
    }
}
