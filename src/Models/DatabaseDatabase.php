<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\DatabaseServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class DatabaseDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $name,
        DatabaseServerSoftwareNameEnum $serverSoftwareName,
        int $clusterId,
        bool $optimizingEnabled,
        bool $backupsEnabled,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setName($name);
        $this->setServerSoftwareName($serverSoftwareName);
        $this->setClusterId($clusterId);
        $this->setOptimizingEnabled($optimizingEnabled);
        $this->setBackupsEnabled($backupsEnabled);
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
            ->length(min: 1, max: 63)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getServerSoftwareName(): DatabaseServerSoftwareNameEnum
    {
        return $this->getAttribute('serverSoftwareName');
    }

    public function setServerSoftwareName(?DatabaseServerSoftwareNameEnum $serverSoftwareName = null): self
    {
        $this->setAttribute('serverSoftwareName', $serverSoftwareName);
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

    public function getOptimizingEnabled(): bool
    {
        return $this->getAttribute('optimizingEnabled');
    }

    public function setOptimizingEnabled(?bool $optimizingEnabled = null): self
    {
        $this->setAttribute('optimizingEnabled', $optimizingEnabled);
        return $this;
    }

    public function getBackupsEnabled(): bool
    {
        return $this->getAttribute('backupsEnabled');
    }

    public function setBackupsEnabled(?bool $backupsEnabled = null): self
    {
        $this->setAttribute('backupsEnabled', $backupsEnabled);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            name: Arr::get($data, 'name'),
            serverSoftwareName: DatabaseServerSoftwareNameEnum::tryFrom(Arr::get($data, 'server_software_name')),
            clusterId: Arr::get($data, 'cluster_id'),
            optimizingEnabled: Arr::get($data, 'optimizing_enabled'),
            backupsEnabled: Arr::get($data, 'backups_enabled'),
        ));
    }
}
