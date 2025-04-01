<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CMSSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CMSResource extends CoreApiModel implements CoreApiModelContract
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
        return $this->getAttribute('createdAt');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('createdAt', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updatedAt', $updatedAt);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('clusterId', $clusterId);
        return $this;
    }

    public function getSoftwareName(): CMSSoftwareNameEnum
    {
        return $this->getAttribute('softwareName');
    }

    public function setSoftwareName(?CMSSoftwareNameEnum $softwareName = null): self
    {
        $this->setAttribute('softwareName', $softwareName);
        return $this;
    }

    public function getIsManuallyCreated(): bool
    {
        return $this->getAttribute('isManuallyCreated');
    }

    public function setIsManuallyCreated(?bool $isManuallyCreated = null): self
    {
        $this->setAttribute('isManuallyCreated', $isManuallyCreated);
        return $this;
    }

    public function getVirtualHostId(): int
    {
        return $this->getAttribute('virtualHostId');
    }

    public function setVirtualHostId(?int $virtualHostId = null): self
    {
        $this->setAttribute('virtualHostId', $virtualHostId);
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
