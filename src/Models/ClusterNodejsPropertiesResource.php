<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterNodejsPropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        array $nodejsVersions,
        int $clusterId,
        ?int $nodejsVersion = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setNodejsVersions($nodejsVersions);
        $this->setClusterId($clusterId);
        $this->setNodejsVersion($nodejsVersion);
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

    public function getNodejsVersion(): int|null
    {
        return $this->getAttribute('nodejs_version');
    }

    public function setNodejsVersion(?int $nodejsVersion = null): self
    {
        $this->setAttribute('nodejs_version', $nodejsVersion);
        return $this;
    }

    public function getNodejsVersions(): array
    {
        return $this->getAttribute('nodejs_versions');
    }

    /**
     * @throws ValidationException
     */
    public function setNodejsVersions(array $nodejsVersions = []): self
    {
        Validator::create()
            ->unique()
            ->assert($nodejsVersions);
        $this->setAttribute('nodejs_versions', $nodejsVersions);
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

    public function getIncludes(): ClusterNodejsPropertiesIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?ClusterNodejsPropertiesIncludes $includes): self
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
            nodejsVersions: Arr::get($data, 'nodejs_versions'),
            clusterId: Arr::get($data, 'cluster_id'),
            nodejsVersion: Arr::get($data, 'nodejs_version'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? ClusterNodejsPropertiesIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
