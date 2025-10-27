<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\MariaDBPrivilegeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataDatabaseUserGrant extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        MariaDBPrivilegeEnum $privilegeName,
        int $databaseId,
        int $databaseUserId,
        TombstoneDataDatabaseUserGrantIncludes $includes,
        ?string $tableName = null,
    ) {
        $this->setId($id);
        $this->setPrivilegeName($privilegeName);
        $this->setDatabaseId($databaseId);
        $this->setDatabaseUserId($databaseUserId);
        $this->setIncludes($includes);
        $this->setTableName($tableName);
    }

    public function getDataType(): string
    {
        return $this->getAttribute('data_type');
    }

    public function setDataType(string $dataType): self
    {
        $this->setAttribute('data_type', $dataType);
        return $this;
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

    public function getTableName(): string|null
    {
        return $this->getAttribute('table_name');
    }

    public function setTableName(?string $tableName): self
    {
        $this->setAttribute('table_name', $tableName);
        return $this;
    }

    public function getPrivilegeName(): MariaDBPrivilegeEnum
    {
        return $this->getAttribute('privilege_name');
    }

    public function setPrivilegeName(MariaDBPrivilegeEnum $privilegeName): self
    {
        $this->setAttribute('privilege_name', $privilegeName);
        return $this;
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

    public function getIncludes(): TombstoneDataDatabaseUserGrantIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(TombstoneDataDatabaseUserGrantIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            privilegeName: MariaDBPrivilegeEnum::tryFrom(Arr::get($data, 'privilege_name')),
            databaseId: Arr::get($data, 'database_id'),
            databaseUserId: Arr::get($data, 'database_user_id'),
            includes: TombstoneDataDatabaseUserGrantIncludes::fromArray(Arr::get($data, 'includes')),
            tableName: Arr::get($data, 'table_name'),
        ))
            ->when(Arr::has($data, 'data_type'), fn (self $model) => $model->setDataType(Arr::get($data, 'data_type', 'database_user_grant')));
    }
}
