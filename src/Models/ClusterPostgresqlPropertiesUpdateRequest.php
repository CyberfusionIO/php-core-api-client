<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterPostgresqlPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getPostgresqlBackupLocalRetention(): int|null
    {
        return $this->getAttribute('postgresql_backup_local_retention');
    }

    public function setPostgresqlBackupLocalRetention(?int $postgresqlBackupLocalRetention): self
    {
        $this->setAttribute('postgresql_backup_local_retention', $postgresqlBackupLocalRetention);
        return $this;
    }

    public function getPostgresqlBackupInterval(): int|null
    {
        return $this->getAttribute('postgresql_backup_interval');
    }

    public function setPostgresqlBackupInterval(?int $postgresqlBackupInterval): self
    {
        $this->setAttribute('postgresql_backup_interval', $postgresqlBackupInterval);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setPostgresqlBackupLocalRetention(Arr::get($data, 'postgresql_backup_local_retention'))
            ->setPostgresqlBackupInterval(Arr::get($data, 'postgresql_backup_interval'));
    }
}
