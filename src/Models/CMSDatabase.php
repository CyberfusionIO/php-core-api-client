<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CMSSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class CMSDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        CMSSoftwareNameEnum $softwareName,
        bool $isManuallyCreated,
        int $virtualHostId,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setClusterId($clusterId);
        $this->setSoftwareName($softwareName);
        $this->setIsManuallyCreated($isManuallyCreated);
        $this->setVirtualHostId($virtualHostId);
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

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getSoftwareName(): CMSSoftwareNameEnum
    {
        return $this->getAttribute('software_name');
    }

    public function setSoftwareName(?CMSSoftwareNameEnum $softwareName = null): self
    {
        $this->setAttribute('software_name', $softwareName);
        return $this;
    }

    public function getIsManuallyCreated(): bool
    {
        return $this->getAttribute('is_manually_created');
    }

    public function setIsManuallyCreated(?bool $isManuallyCreated = null): self
    {
        $this->setAttribute('is_manually_created', $isManuallyCreated);
        return $this;
    }

    public function getVirtualHostId(): int
    {
        return $this->getAttribute('virtual_host_id');
    }

    public function setVirtualHostId(?int $virtualHostId = null): self
    {
        $this->setAttribute('virtual_host_id', $virtualHostId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            clusterId: Arr::get($data, 'cluster_id'),
            softwareName: CMSSoftwareNameEnum::tryFrom(Arr::get($data, 'software_name')),
            isManuallyCreated: Arr::get($data, 'is_manually_created'),
            virtualHostId: Arr::get($data, 'virtual_host_id'),
        ));
    }
}
