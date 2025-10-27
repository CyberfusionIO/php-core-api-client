<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClustersMariadbPropertiesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getMariadbVersion(): string|null
    {
        return $this->getAttribute('mariadb_version');
    }

    public function setMariadbVersion(?string $mariadbVersion): self
    {
        $this->setAttribute('mariadb_version', $mariadbVersion);
        return $this;
    }

    public function getMariadbClusterName(): string|null
    {
        return $this->getAttribute('mariadb_cluster_name');
    }

    public function setMariadbClusterName(?string $mariadbClusterName): self
    {
        $this->setAttribute('mariadb_cluster_name', $mariadbClusterName);
        return $this;
    }

    public function getMariadbBackupInterval(): int|null
    {
        return $this->getAttribute('mariadb_backup_interval');
    }

    public function setMariadbBackupInterval(?int $mariadbBackupInterval): self
    {
        $this->setAttribute('mariadb_backup_interval', $mariadbBackupInterval);
        return $this;
    }

    public function getMariadbBackupLocalRetention(): int|null
    {
        return $this->getAttribute('mariadb_backup_local_retention');
    }

    public function setMariadbBackupLocalRetention(?int $mariadbBackupLocalRetention): self
    {
        $this->setAttribute('mariadb_backup_local_retention', $mariadbBackupLocalRetention);
        return $this;
    }

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'mariadb_version'), fn (self $model) => $model->setMariadbVersion(Arr::get($data, 'mariadb_version')))
            ->when(Arr::has($data, 'mariadb_cluster_name'), fn (self $model) => $model->setMariadbClusterName(Arr::get($data, 'mariadb_cluster_name')))
            ->when(Arr::has($data, 'mariadb_backup_interval'), fn (self $model) => $model->setMariadbBackupInterval(Arr::get($data, 'mariadb_backup_interval')))
            ->when(Arr::has($data, 'mariadb_backup_local_retention'), fn (self $model) => $model->setMariadbBackupLocalRetention(Arr::get($data, 'mariadb_backup_local_retention')))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')));
    }
}
