<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterMetabasePropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $metabaseDomain,
        string $metabaseDatabasePassword,
        int $clusterId,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setMetabaseDomain($metabaseDomain);
        $this->setMetabaseDatabasePassword($metabaseDatabasePassword);
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

    public function getMetabaseDomain(): string
    {
        return $this->getAttribute('metabase_domain');
    }

    public function setMetabaseDomain(?string $metabaseDomain = null): self
    {
        $this->setAttribute('metabase_domain', $metabaseDomain);
        return $this;
    }

    public function getMetabaseDatabasePassword(): string
    {
        return $this->getAttribute('metabase_database_password');
    }

    /**
     * @throws ValidationException
     */
    public function setMetabaseDatabasePassword(?string $metabaseDatabasePassword = null): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[ -~]+$/')
            ->assert($metabaseDatabasePassword);
        $this->setAttribute('metabase_database_password', $metabaseDatabasePassword);
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

    public function getIncludes(): ClusterMetabasePropertiesIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?ClusterMetabasePropertiesIncludes $includes): self
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
            metabaseDomain: Arr::get($data, 'metabase_domain'),
            metabaseDatabasePassword: Arr::get($data, 'metabase_database_password'),
            clusterId: Arr::get($data, 'cluster_id'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? ClusterMetabasePropertiesIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
