<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\UNIXUserHomeDirectoryEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterUnixUsersPropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        UNIXUserHomeDirectoryEnum $unixUsersHomeDirectory,
        int $clusterId,
        ClusterUnixUsersPropertiesIncludes $includes,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setUnixUsersHomeDirectory($unixUsersHomeDirectory);
        $this->setClusterId($clusterId);
        $this->setIncludes($includes);
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

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getUnixUsersHomeDirectory(): UNIXUserHomeDirectoryEnum
    {
        return $this->getAttribute('unix_users_home_directory');
    }

    public function setUnixUsersHomeDirectory(UNIXUserHomeDirectoryEnum $unixUsersHomeDirectory): self
    {
        $this->setAttribute('unix_users_home_directory', $unixUsersHomeDirectory);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getIncludes(): ClusterUnixUsersPropertiesIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(ClusterUnixUsersPropertiesIncludes $includes): self
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
            unixUsersHomeDirectory: UNIXUserHomeDirectoryEnum::tryFrom(Arr::get($data, 'unix_users_home_directory')),
            clusterId: Arr::get($data, 'cluster_id'),
            includes: ClusterUnixUsersPropertiesIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
