<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterMariadbPropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $mariadbVersion,
        string $mariadbClusterName,
        int $mariadbBackupInterval,
        int $mariadbBackupLocalRetention,
        int $clusterId,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setMariadbVersion($mariadbVersion);
        $this->setMariadbClusterName($mariadbClusterName);
        $this->setMariadbBackupInterval($mariadbBackupInterval);
        $this->setMariadbBackupLocalRetention($mariadbBackupLocalRetention);
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

    public function getMariadbVersion(): string
    {
        return $this->getAttribute('mariadb_version');
    }

    public function setMariadbVersion(?string $mariadbVersion = null): self
    {
        $this->setAttribute('mariadb_version', $mariadbVersion);
        return $this;
    }

    public function getMariadbClusterName(): string
    {
        return $this->getAttribute('mariadb_cluster_name');
    }

    /**
     * @throws ValidationException
     */
    public function setMariadbClusterName(?string $mariadbClusterName = null): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-z.]+$/')
            ->assert($mariadbClusterName);
        $this->setAttribute('mariadb_cluster_name', $mariadbClusterName);
        return $this;
    }

    public function getMariadbBackupInterval(): int
    {
        return $this->getAttribute('mariadb_backup_interval');
    }

    public function setMariadbBackupInterval(?int $mariadbBackupInterval = null): self
    {
        $this->setAttribute('mariadb_backup_interval', $mariadbBackupInterval);
        return $this;
    }

    public function getMariadbBackupLocalRetention(): int
    {
        return $this->getAttribute('mariadb_backup_local_retention');
    }

    public function setMariadbBackupLocalRetention(?int $mariadbBackupLocalRetention = null): self
    {
        $this->setAttribute('mariadb_backup_local_retention', $mariadbBackupLocalRetention);
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

    public function getIncludes(): ClusterMariadbPropertiesIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?ClusterMariadbPropertiesIncludes $includes): self
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
            mariadbVersion: Arr::get($data, 'mariadb_version'),
            mariadbClusterName: Arr::get($data, 'mariadb_cluster_name'),
            mariadbBackupInterval: Arr::get($data, 'mariadb_backup_interval'),
            mariadbBackupLocalRetention: Arr::get($data, 'mariadb_backup_local_retention'),
            clusterId: Arr::get($data, 'cluster_id'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? ClusterMariadbPropertiesIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
