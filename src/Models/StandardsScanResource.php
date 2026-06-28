<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\DeploymentStatusEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class StandardsScanResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        string $startedAt,
        array $domainRoutersIds,
        DeploymentStatusEnum $deploymentStatus,
        StandardsScanIncludes $includes,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setClusterId($clusterId);
        $this->setStartedAt($startedAt);
        $this->setDomainRoutersIds($domainRoutersIds);
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

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getStartedAt(): string
    {
        return $this->getAttribute('started_at');
    }

    public function setStartedAt(string $startedAt): self
    {
        $this->setAttribute('started_at', $startedAt);
        return $this;
    }

    public function getDomainRoutersIds(): array
    {
        return $this->getAttribute('domain_routers_ids');
    }

    /**
     * @throws ValidationException
     */
    public function setDomainRoutersIds(array $domainRoutersIds): self
    {
        Validator::create()
            ->unique()
            ->assert($domainRoutersIds);
        $this->setAttribute('domain_routers_ids', $domainRoutersIds);
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

    public function getIncludes(): StandardsScanIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(StandardsScanIncludes $includes): self
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
            startedAt: Arr::get($data, 'started_at'),
            domainRoutersIds: Arr::get($data, 'domain_routers_ids'),
            deploymentStatus: DeploymentStatusEnum::tryFrom(Arr::get($data, 'deployment_status')),
            includes: StandardsScanIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
