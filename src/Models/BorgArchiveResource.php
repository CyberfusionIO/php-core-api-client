<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BorgArchiveResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        int $borgRepositoryId,
        string $name,
        ?int $databaseId = null,
        ?int $unixUserId = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setClusterId($clusterId);
        $this->setBorgRepositoryId($borgRepositoryId);
        $this->setName($name);
        $this->setDatabaseId($databaseId);
        $this->setUnixUserId($unixUserId);
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

    public function getIncludes(): BorgArchiveIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?BorgArchiveIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
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
            databaseId: Arr::get($data, 'database_id'),
            unixUserId: Arr::get($data, 'unix_user_id'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? BorgArchiveIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
