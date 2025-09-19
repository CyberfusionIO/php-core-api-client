<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $name,
        int $customerId,
        int $siteId,
        string $description,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setName($name);
        $this->setCustomerId($customerId);
        $this->setSiteId($siteId);
        $this->setDescription($description);
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
            ->regex('/^[a-z0-9-.]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getCustomerId(): int
    {
        return $this->getAttribute('customer_id');
    }

    public function setCustomerId(?int $customerId = null): self
    {
        $this->setAttribute('customer_id', $customerId);
        return $this;
    }

    public function getSiteId(): int
    {
        return $this->getAttribute('site_id');
    }

    public function setSiteId(?int $siteId = null): self
    {
        $this->setAttribute('site_id', $siteId);
        return $this;
    }

    public function getDescription(): string
    {
        return $this->getAttribute('description');
    }

    /**
     * @throws ValidationException
     */
    public function setDescription(?string $description = null): self
    {
        Validator::create()
            ->length(min: 1, max: 255)
            ->regex('/^[a-zA-Z0-9-_. ]+$/')
            ->assert($description);
        $this->setAttribute('description', $description);
        return $this;
    }

    public function getIncludes(): ClusterIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?ClusterIncludes $includes): self
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
            customerId: Arr::get($data, 'customer_id'),
            siteId: Arr::get($data, 'site_id'),
            description: Arr::get($data, 'description'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? ClusterIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
