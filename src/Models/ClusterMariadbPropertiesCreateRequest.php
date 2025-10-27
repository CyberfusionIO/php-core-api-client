<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterMariadbPropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $mariadbVersion)
    {
        $this->setMariadbVersion($mariadbVersion);
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

    public static function fromArray(array $data): self
    {
        return (new self(
            mariadbVersion: Arr::get($data, 'mariadb_version'),
        ))
            ->when(Arr::has($data, 'mariadb_backup_interval'), fn (self $model) => $model->setMariadbBackupInterval(Arr::get($data, 'mariadb_backup_interval', 24)))
            ->when(Arr::has($data, 'mariadb_backup_local_retention'), fn (self $model) => $model->setMariadbBackupLocalRetention(Arr::get($data, 'mariadb_backup_local_retention', 3)));
    }
}
