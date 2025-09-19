<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterMariadbPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
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

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setMariadbBackupInterval(Arr::get($data, 'mariadb_backup_interval'))
            ->setMariadbBackupLocalRetention(Arr::get($data, 'mariadb_backup_local_retention'));
    }
}
