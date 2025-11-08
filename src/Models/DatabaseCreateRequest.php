<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\DatabaseServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $name, DatabaseServerSoftwareNameEnum $serverSoftwareName, int $clusterId)
    {
        $this->setName($name);
        $this->setServerSoftwareName($serverSoftwareName);
        $this->setClusterId($clusterId);
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
            ->length(min: 1, max: 63)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getServerSoftwareName(): DatabaseServerSoftwareNameEnum
    {
        return $this->getAttribute('server_software_name');
    }

    public function setServerSoftwareName(DatabaseServerSoftwareNameEnum $serverSoftwareName): self
    {
        $this->setAttribute('server_software_name', $serverSoftwareName);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getOptimizingEnabled(): bool
    {
        return $this->getAttribute('optimizing_enabled');
    }

    public function setOptimizingEnabled(bool $optimizingEnabled): self
    {
        $this->setAttribute('optimizing_enabled', $optimizingEnabled);
        return $this;
    }

    public function getBackupsEnabled(): bool
    {
        return $this->getAttribute('backups_enabled');
    }

    public function setBackupsEnabled(bool $backupsEnabled): self
    {
        $this->setAttribute('backups_enabled', $backupsEnabled);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            serverSoftwareName: DatabaseServerSoftwareNameEnum::tryFrom(Arr::get($data, 'server_software_name')),
            clusterId: Arr::get($data, 'cluster_id'),
        ))
            ->when(Arr::has($data, 'optimizing_enabled'), fn (self $model) => $model->setOptimizingEnabled(Arr::get($data, 'optimizing_enabled', false)))
            ->when(Arr::has($data, 'backups_enabled'), fn (self $model) => $model->setBackupsEnabled(Arr::get($data, 'backups_enabled', true)));
    }
}
