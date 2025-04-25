<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BorgArchiveDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        int $borgRepositoryId,
        string $name,
        ClusterDatabase $cluster,
        BorgRepositoryDatabase $borgRepository,
        ?int $databaseId = null,
        ?int $unixUserId = null,
        ?UNIXUserDatabase $unixUser = null,
        ?DatabaseDatabase $database = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setClusterId($clusterId);
        $this->setBorgRepositoryId($borgRepositoryId);
        $this->setName($name);
        $this->setCluster($cluster);
        $this->setBorgRepository($borgRepository);
        $this->setDatabaseId($databaseId);
        $this->setUnixUserId($unixUserId);
        $this->setUnixUser($unixUser);
        $this->setDatabase($database);
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
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getDatabaseId(): int|null
    {
        return $this->getAttribute('database_id');
    }

    public function setDatabaseId(?int $databaseId = null): self
    {
        $this->setAttribute('database_id', $databaseId);
        return $this;
    }

    public function getUnixUserId(): int|null
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getBorgRepositoryId(): int
    {
        return $this->getAttribute('borg_repository_id');
    }

    public function setBorgRepositoryId(?int $borgRepositoryId = null): self
    {
        $this->setAttribute('borg_repository_id', $borgRepositoryId);
        return $this;
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(?string $name = null): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-zA-Z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getCluster(): ClusterDatabase
    {
        return $this->getAttribute('cluster');
    }

    public function setCluster(?ClusterDatabase $cluster = null): self
    {
        $this->setAttribute('cluster', $cluster);
        return $this;
    }

    public function getBorgRepository(): BorgRepositoryDatabase
    {
        return $this->getAttribute('borg_repository');
    }

    public function setBorgRepository(?BorgRepositoryDatabase $borgRepository = null): self
    {
        $this->setAttribute('borg_repository', $borgRepository);
        return $this;
    }

    public function getUnixUser(): UNIXUserDatabase|null
    {
        return $this->getAttribute('unix_user');
    }

    public function setUnixUser(?UNIXUserDatabase $unixUser = null): self
    {
        $this->setAttribute('unix_user', $unixUser);
        return $this;
    }

    public function getDatabase(): DatabaseDatabase|null
    {
        return $this->getAttribute('database');
    }

    public function setDatabase(?DatabaseDatabase $database = null): self
    {
        $this->setAttribute('database', $database);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            clusterId: Arr::get($data, 'cluster_id'),
            borgRepositoryId: Arr::get($data, 'borg_repository_id'),
            name: Arr::get($data, 'name'),
            cluster: ClusterDatabase::fromArray(Arr::get($data, 'cluster')),
            borgRepository: BorgRepositoryDatabase::fromArray(Arr::get($data, 'borg_repository')),
            databaseId: Arr::get($data, 'database_id'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            unixUser: Arr::get($data, 'unix_user') !== null ? UNIXUserDatabase::fromArray(Arr::get($data, 'unix_user')) : null,
            database: Arr::get($data, 'database') !== null ? DatabaseDatabase::fromArray(Arr::get($data, 'database')) : null,
        ));
    }
}
