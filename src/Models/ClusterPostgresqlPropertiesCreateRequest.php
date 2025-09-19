<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterPostgresqlPropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $postgresqlVersion)
    {
        $this->setPostgresqlVersion($postgresqlVersion);
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

    public function setPostgresqlBackupLocalRetention(int $postgresqlBackupLocalRetention): self
    {
        $this->setAttribute('postgresql_backup_local_retention', $postgresqlBackupLocalRetention);
        return $this;
    }

    public function getPostgresqlBackupInterval(): int
    {
        return $this->getAttribute('postgresql_backup_interval');
    }

    public function setPostgresqlBackupInterval(int $postgresqlBackupInterval): self
    {
        $this->setAttribute('postgresql_backup_interval', $postgresqlBackupInterval);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            postgresqlVersion: Arr::get($data, 'postgresql_version'),
        ))
            ->setPostgresqlBackupLocalRetention(Arr::get($data, 'postgresql_backup_local_retention', 3))
            ->setPostgresqlBackupInterval(Arr::get($data, 'postgresql_backup_interval', 24));
    }
}
