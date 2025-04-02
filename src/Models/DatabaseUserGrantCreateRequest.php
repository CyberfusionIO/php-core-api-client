<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\MariaDBPrivilegeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUserGrantCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $databaseId,
        int $databaseUserId,
        MariaDBPrivilegeEnum $privilegeName,
        ?string $tableName = null,
    ) {
        $this->setDatabaseId($databaseId);
        $this->setDatabaseUserId($databaseUserId);
        $this->setPrivilegeName($privilegeName);
        $this->setTableName($tableName);
    }

    public function getDatabaseId(): int
    {
        return $this->getAttribute('databaseId');
    }

    public function setDatabaseId(?int $databaseId = null): self
    {
        $this->setAttribute('database_id', $databaseId);
        return $this;
    }

    public function getDatabaseUserId(): int
    {
        return $this->getAttribute('databaseUserId');
    }

    public function setDatabaseUserId(?int $databaseUserId = null): self
    {
        $this->setAttribute('database_user_id', $databaseUserId);
        return $this;
    }

    public function getTableName(): string|null
    {
        return $this->getAttribute('tableName');
    }

    public function setTableName(?string $tableName = null): self
    {
        $this->setAttribute('table_name', $tableName);
        return $this;
    }

    public function getPrivilegeName(): MariaDBPrivilegeEnum
    {
        return $this->getAttribute('privilegeName');
    }

    public function setPrivilegeName(?MariaDBPrivilegeEnum $privilegeName = null): self
    {
        $this->setAttribute('privilege_name', $privilegeName);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            databaseId: Arr::get($data, 'database_id'),
            databaseUserId: Arr::get($data, 'database_user_id'),
            privilegeName: MariaDBPrivilegeEnum::tryFrom(Arr::get($data, 'privilege_name')),
            tableName: Arr::get($data, 'table_name'),
        ));
    }
}
