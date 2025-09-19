<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterPostgresqlPropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $postgresqlVersion,
        int $postgresqlBackupLocalRetention,
        int $postgresqlBackupInterval,
        int $clusterId,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setPostgresqlVersion($postgresqlVersion);
        $this->setPostgresqlBackupLocalRetention($postgresqlBackupLocalRetention);
        $this->setPostgresqlBackupInterval($postgresqlBackupInterval);
        $this->setClusterId($clusterId);
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
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getPostgresqlVersion(): int
    {
        return $this->getAttribute('postgresql_version');
    }

    public function setPostgresqlVersion(?int $postgresqlVersion = null): self
    {
        $this->setAttribute('postgresql_version', $postgresqlVersion);
        return $this;
    }

    public function getPostgresqlBackupLocalRetention(): int
    {
        return $this->getAttribute('postgresql_backup_local_retention');
    }

    public function setPostgresqlBackupLocalRetention(?int $postgresqlBackupLocalRetention = null): self
    {
        $this->setAttribute('postgresql_backup_local_retention', $postgresqlBackupLocalRetention);
        return $this;
    }

    public function getPostgresqlBackupInterval(): int
    {
        return $this->getAttribute('postgresql_backup_interval');
    }

    public function setPostgresqlBackupInterval(?int $postgresqlBackupInterval = null): self
    {
        $this->setAttribute('postgresql_backup_interval', $postgresqlBackupInterval);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getIncludes(): ClusterPostgresqlPropertiesIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?ClusterPostgresqlPropertiesIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            postgresqlVersion: Arr::get($data, 'postgresql_version'),
            postgresqlBackupLocalRetention: Arr::get($data, 'postgresql_backup_local_retention'),
            postgresqlBackupInterval: Arr::get($data, 'postgresql_backup_interval'),
            clusterId: Arr::get($data, 'cluster_id'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? ClusterPostgresqlPropertiesIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
