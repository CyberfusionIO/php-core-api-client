<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\MeilisearchEnvironmentEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterMeilisearchPropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $meilisearchBackupLocalRetention,
        string $meilisearchMasterKey,
        MeilisearchEnvironmentEnum $meilisearchEnvironment,
        int $meilisearchBackupInterval,
        int $clusterId,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setMeilisearchBackupLocalRetention($meilisearchBackupLocalRetention);
        $this->setMeilisearchMasterKey($meilisearchMasterKey);
        $this->setMeilisearchEnvironment($meilisearchEnvironment);
        $this->setMeilisearchBackupInterval($meilisearchBackupInterval);
        $this->setClusterId($clusterId);
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

    public function getMeilisearchBackupLocalRetention(): int
    {
        return $this->getAttribute('meilisearch_backup_local_retention');
    }

    public function setMeilisearchBackupLocalRetention(?int $meilisearchBackupLocalRetention = null): self
    {
        $this->setAttribute('meilisearch_backup_local_retention', $meilisearchBackupLocalRetention);
        return $this;
    }

    public function getMeilisearchMasterKey(): string
    {
        return $this->getAttribute('meilisearch_master_key');
    }

    /**
     * @throws ValidationException
     */
    public function setMeilisearchMasterKey(?string $meilisearchMasterKey = null): self
    {
        Validator::create()
            ->length(min: 16, max: 24)
            ->regex('/^[a-zA-Z0-9]+$/')
            ->assert($meilisearchMasterKey);
        $this->setAttribute('meilisearch_master_key', $meilisearchMasterKey);
        return $this;
    }

    public function getMeilisearchEnvironment(): MeilisearchEnvironmentEnum
    {
        return $this->getAttribute('meilisearch_environment');
    }

    public function setMeilisearchEnvironment(?MeilisearchEnvironmentEnum $meilisearchEnvironment = null): self
    {
        $this->setAttribute('meilisearch_environment', $meilisearchEnvironment);
        return $this;
    }

    public function getMeilisearchBackupInterval(): int
    {
        return $this->getAttribute('meilisearch_backup_interval');
    }

    public function setMeilisearchBackupInterval(?int $meilisearchBackupInterval = null): self
    {
        $this->setAttribute('meilisearch_backup_interval', $meilisearchBackupInterval);
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

    public function getIncludes(): ClusterMeilisearchPropertiesIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?ClusterMeilisearchPropertiesIncludes $includes): self
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
            meilisearchBackupLocalRetention: Arr::get($data, 'meilisearch_backup_local_retention'),
            meilisearchMasterKey: Arr::get($data, 'meilisearch_master_key'),
            meilisearchEnvironment: MeilisearchEnvironmentEnum::tryFrom(Arr::get($data, 'meilisearch_environment')),
            meilisearchBackupInterval: Arr::get($data, 'meilisearch_backup_interval'),
            clusterId: Arr::get($data, 'cluster_id'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? ClusterMeilisearchPropertiesIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
