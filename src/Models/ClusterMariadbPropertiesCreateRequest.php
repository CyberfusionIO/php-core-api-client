<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterMariadbPropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $mariadbVersion)
    {
        $this->setMariadbVersion($mariadbVersion);
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
            ->setMariadbBackupInterval(Arr::get($data, 'mariadb_backup_interval', 24))
            ->setMariadbBackupLocalRetention(Arr::get($data, 'mariadb_backup_local_retention', 3));
    }
}
