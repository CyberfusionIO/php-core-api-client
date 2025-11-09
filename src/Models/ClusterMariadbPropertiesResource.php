<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterMariadbPropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $mariadbVersion,
        int $mariadbBackupInterval,
        int $mariadbBackupLocalRetention,
        int $clusterId,
        ClusterMariadbPropertiesIncludes $includes,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setMariadbVersion($mariadbVersion);
        $this->setMariadbBackupInterval($mariadbBackupInterval);
        $this->setMariadbBackupLocalRetention($mariadbBackupLocalRetention);
        $this->setClusterId($clusterId);
        $this->setIncludes($includes);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(int $id): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getMariadbVersion(): string
    {
        return $this->getAttribute('mariadb_version');
    }

    public function setMariadbVersion(string $mariadbVersion): self
    {
        $this->setAttribute('mariadb_version', $mariadbVersion);
        return $this;
    }

    public function getMariadbBackupInterval(): int
    {
        return $this->getAttribute('mariadb_backup_interval');
    }

    public function setMariadbBackupInterval(int $mariadbBackupInterval): self
    {
        $this->setAttribute('mariadb_backup_interval', $mariadbBackupInterval);
        return $this;
    }

    public function getMariadbBackupLocalRetention(): int
    {
        return $this->getAttribute('mariadb_backup_local_retention');
    }

    public function setMariadbBackupLocalRetention(int $mariadbBackupLocalRetention): self
    {
        $this->setAttribute('mariadb_backup_local_retention', $mariadbBackupLocalRetention);
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

    public function getIncludes(): ClusterMariadbPropertiesIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(ClusterMariadbPropertiesIncludes $includes): self
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
            mariadbBackupInterval: Arr::get($data, 'mariadb_backup_interval'),
            mariadbBackupLocalRetention: Arr::get($data, 'mariadb_backup_local_retention'),
            clusterId: Arr::get($data, 'cluster_id'),
            includes: ClusterMariadbPropertiesIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
