<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $name,
        int $regionId,
        string $description,
        int $customerId,
        bool $cephfsEnabled,
        ClusterIncludes $includes,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setName($name);
        $this->setRegionId($regionId);
        $this->setDescription($description);
        $this->setCustomerId($customerId);
        $this->setCephfsEnabled($cephfsEnabled);
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

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(string $name): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-z0-9-.]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getRegionId(): int
    {
        return $this->getAttribute('region_id');
    }

    public function setRegionId(int $regionId): self
    {
        $this->setAttribute('region_id', $regionId);
        return $this;
    }

    public function getDescription(): string
    {
        return $this->getAttribute('description');
    }

    /**
     * @throws ValidationException
     */
    public function setDescription(string $description): self
    {
        Validator::create()
            ->length(min: 1, max: 255)
            ->regex('/^[a-zA-Z0-9-_. ]+$/')
            ->assert($description);
        $this->setAttribute('description', $description);
        return $this;
    }

    public function getCustomerId(): int
    {
        return $this->getAttribute('customer_id');
    }

    public function setCustomerId(int $customerId): self
    {
        $this->setAttribute('customer_id', $customerId);
        return $this;
    }

    public function getCephfsEnabled(): bool
    {
        return $this->getAttribute('cephfs_enabled');
    }

    public function setCephfsEnabled(bool $cephfsEnabled): self
    {
        $this->setAttribute('cephfs_enabled', $cephfsEnabled);
        return $this;
    }

    public function getIncludes(): ClusterIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(ClusterIncludes $includes): self
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
            name: Arr::get($data, 'name'),
            regionId: Arr::get($data, 'region_id'),
            description: Arr::get($data, 'description'),
            customerId: Arr::get($data, 'customer_id'),
            cephfsEnabled: Arr::get($data, 'cephfs_enabled'),
            includes: ClusterIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
