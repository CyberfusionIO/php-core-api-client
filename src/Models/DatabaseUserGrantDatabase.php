<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\MariaDBPrivilegeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class DatabaseUserGrantDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        int $databaseId,
        int $databaseUserId,
        MariaDBPrivilegeEnum $privilegeName,
        ?string $tableName = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setClusterId($clusterId);
        $this->setDatabaseId($databaseId);
        $this->setDatabaseUserId($databaseUserId);
        $this->setPrivilegeName($privilegeName);
        $this->setTableName($tableName);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('createdAt');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
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
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            clusterId: Arr::get($data, 'cluster_id'),
            databaseId: Arr::get($data, 'database_id'),
            databaseUserId: Arr::get($data, 'database_user_id'),
            privilegeName: MariaDBPrivilegeEnum::tryFrom(Arr::get($data, 'privilege_name')),
            tableName: Arr::get($data, 'table_name'),
        ));
    }
}
