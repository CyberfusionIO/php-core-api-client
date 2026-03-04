<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\DeploymentStatusEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MariadbEncryptionKeyResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $identifier,
        string $key,
        int $clusterId,
        DeploymentStatusEnum $deploymentStatus,
        MariadbEncryptionKeyIncludes $includes,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setIdentifier($identifier);
        $this->setKey($key);
        $this->setClusterId($clusterId);
        $this->setDeploymentStatus($deploymentStatus);
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

    public function getIdentifier(): int
    {
        return $this->getAttribute('identifier');
    }

    public function setIdentifier(int $identifier): self
    {
        $this->setAttribute('identifier', $identifier);
        return $this;
    }

    public function getKey(): string
    {
        return $this->getAttribute('key');
    }

    /**
     * @throws ValidationException
     */
    public function setKey(string $key): self
    {
        Validator::create()
            ->length(min: 64, max: 64)
            ->regex('/^[a-z0-9]+$/')
            ->assert($key);
        $this->setAttribute('key', $key);
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

    public function getDeploymentStatus(): DeploymentStatusEnum
    {
        return $this->getAttribute('deployment_status');
    }

    public function setDeploymentStatus(DeploymentStatusEnum $deploymentStatus): self
    {
        $this->setAttribute('deployment_status', $deploymentStatus);
        return $this;
    }

    public function getIncludes(): MariadbEncryptionKeyIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(MariadbEncryptionKeyIncludes $includes): self
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
            identifier: Arr::get($data, 'identifier'),
            key: Arr::get($data, 'key'),
            clusterId: Arr::get($data, 'cluster_id'),
            deploymentStatus: DeploymentStatusEnum::tryFrom(Arr::get($data, 'deployment_status')),
            includes: MariadbEncryptionKeyIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
