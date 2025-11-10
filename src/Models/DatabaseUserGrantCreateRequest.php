<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\MariadbPrivilegeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUserGrantCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $databaseId,
        int $databaseUserId,
        MariadbPrivilegeEnum $privilegeName,
        ?string $tableName = null,
    ) {
        $this->setDatabaseId($databaseId);
        $this->setDatabaseUserId($databaseUserId);
        $this->setPrivilegeName($privilegeName);
        $this->setTableName($tableName);
    }

    public function getDatabaseId(): int
    {
        return $this->getAttribute('database_id');
    }

    public function setDatabaseId(int $databaseId): self
    {
        $this->setAttribute('database_id', $databaseId);
        return $this;
    }

    public function getDatabaseUserId(): int
    {
        return $this->getAttribute('database_user_id');
    }

    public function setDatabaseUserId(int $databaseUserId): self
    {
        $this->setAttribute('database_user_id', $databaseUserId);
        return $this;
    }

    public function getTableName(): string|null
    {
        return $this->getAttribute('table_name');
    }

    public function setTableName(?string $tableName): self
    {
        $this->setAttribute('table_name', $tableName);
        return $this;
    }

    public function getPrivilegeName(): MariadbPrivilegeEnum
    {
        return $this->getAttribute('privilege_name');
    }

    public function setPrivilegeName(MariadbPrivilegeEnum $privilegeName): self
    {
        $this->setAttribute('privilege_name', $privilegeName);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            databaseId: Arr::get($data, 'database_id'),
            databaseUserId: Arr::get($data, 'database_user_id'),
            privilegeName: MariadbPrivilegeEnum::tryFrom(Arr::get($data, 'privilege_name')),
            tableName: Arr::get($data, 'table_name'),
        ));
    }
}
