<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\MariadbPrivilegeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUserGrantsSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getDatabaseId(): int|null
    {
        return $this->getAttribute('database_id');
    }

    public function setDatabaseId(?int $databaseId): self
    {
        $this->setAttribute('database_id', $databaseId);
        return $this;
    }

    public function getDatabaseUserId(): int|null
    {
        return $this->getAttribute('database_user_id');
    }

    public function setDatabaseUserId(?int $databaseUserId): self
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

    public function getPrivilegeName(): MariadbPrivilegeEnum|null
    {
        return $this->getAttribute('privilege_name');
    }

    public function setPrivilegeName(?MariadbPrivilegeEnum $privilegeName): self
    {
        $this->setAttribute('privilege_name', $privilegeName);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'database_id'), fn (self $model) => $model->setDatabaseId(Arr::get($data, 'database_id')))
            ->when(Arr::has($data, 'database_user_id'), fn (self $model) => $model->setDatabaseUserId(Arr::get($data, 'database_user_id')))
            ->when(Arr::has($data, 'table_name'), fn (self $model) => $model->setTableName(Arr::get($data, 'table_name')))
            ->when(Arr::has($data, 'privilege_name'), fn (self $model) => $model->setPrivilegeName(Arr::get($data, 'privilege_name') !== null ? MariadbPrivilegeEnum::tryFrom(Arr::get($data, 'privilege_name')) : null));
    }
}
