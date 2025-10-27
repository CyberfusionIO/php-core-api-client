<?php

namespace Cyberfusion\CoreApi\Models;

use ArrayObject;
use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\PassengerEnvironmentEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class PassengerAppCreateNodeJSRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        string $name,
        string $appRoot,
        int $unixUserId,
        PassengerEnvironmentEnum $environment,
        ArrayObject $environmentVariables,
        int $maxPoolSize,
        int $maxRequests,
        int $poolIdleTime,
        bool $isNamespaced,
        string $nodejsVersion,
        string $startupFile,
        ?int $cpuLimit = null,
    ) {
        $this->setName($name);
        $this->setAppRoot($appRoot);
        $this->setUnixUserId($unixUserId);
        $this->setEnvironment($environment);
        $this->setEnvironmentVariables($environmentVariables);
        $this->setMaxPoolSize($maxPoolSize);
        $this->setMaxRequests($maxRequests);
        $this->setPoolIdleTime($poolIdleTime);
        $this->setIsNamespaced($isNamespaced);
        $this->setNodejsVersion($nodejsVersion);
        $this->setStartupFile($startupFile);
        $this->setCpuLimit($cpuLimit);
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

    public function getAppRoot(): string
    {
        return $this->getAttribute('app_root');
    }

    public function setAppRoot(string $appRoot): self
    {
        $this->setAttribute('app_root', $appRoot);
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

    public function getEnvironment(): PassengerEnvironmentEnum
    {
        return $this->getAttribute('environment');
    }

    public function setEnvironment(PassengerEnvironmentEnum $environment): self
    {
        $this->setAttribute('environment', $environment);
        return $this;
    }

    public function getEnvironmentVariables(): ArrayObject
    {
        return $this->getAttribute('environment_variables');
    }

    public function setEnvironmentVariables(ArrayObject $environmentVariables): self
    {
        $this->setAttribute('environment_variables', $environmentVariables);
        return $this;
    }

    public function getMaxPoolSize(): int
    {
        return $this->getAttribute('max_pool_size');
    }

    public function setMaxPoolSize(int $maxPoolSize): self
    {
        $this->setAttribute('max_pool_size', $maxPoolSize);
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

    public function getPoolIdleTime(): int
    {
        return $this->getAttribute('pool_idle_time');
    }

    public function setPoolIdleTime(int $poolIdleTime): self
    {
        $this->setAttribute('pool_idle_time', $poolIdleTime);
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

    public function getCpuLimit(): int|null
    {
        return $this->getAttribute('cpu_limit');
    }

    public function setCpuLimit(?int $cpuLimit): self
    {
        $this->setAttribute('cpu_limit', $cpuLimit);
        return $this;
    }

    public function getNodejsVersion(): string
    {
        return $this->getAttribute('nodejs_version');
    }

    /**
     * @throws ValidationException
     */
    public function setNodejsVersion(string $nodejsVersion): self
    {
        Validator::create()
            ->regex('/^[0-9]{1,2}\.[0-9]{1,2}$/')
            ->assert($nodejsVersion);
        $this->setAttribute('nodejs_version', $nodejsVersion);
        return $this;
    }

    public function getStartupFile(): string
    {
        return $this->getAttribute('startup_file');
    }

    public function setStartupFile(string $startupFile): self
    {
        $this->setAttribute('startup_file', $startupFile);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            appRoot: Arr::get($data, 'app_root'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            environment: PassengerEnvironmentEnum::tryFrom(Arr::get($data, 'environment')),
            environmentVariables: new ArrayObject(Arr::get($data, 'environment_variables')),
            maxPoolSize: Arr::get($data, 'max_pool_size'),
            maxRequests: Arr::get($data, 'max_requests'),
            poolIdleTime: Arr::get($data, 'pool_idle_time'),
            isNamespaced: Arr::get($data, 'is_namespaced'),
            nodejsVersion: Arr::get($data, 'nodejs_version'),
            startupFile: Arr::get($data, 'startup_file'),
            cpuLimit: Arr::get($data, 'cpu_limit'),
        ));
    }
}
