<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterOsPropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        bool $automaticUpgradesEnabled,
        int $clusterId,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setAutomaticUpgradesEnabled($automaticUpgradesEnabled);
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

    public function getAutomaticUpgradesEnabled(): bool
    {
        return $this->getAttribute('automatic_upgrades_enabled');
    }

    public function setAutomaticUpgradesEnabled(?bool $automaticUpgradesEnabled = null): self
    {
        $this->setAttribute('automatic_upgrades_enabled', $automaticUpgradesEnabled);
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

    public function getIncludes(): ClusterOsPropertiesIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?ClusterOsPropertiesIncludes $includes): self
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
            automaticUpgradesEnabled: Arr::get($data, 'automatic_upgrades_enabled'),
            clusterId: Arr::get($data, 'cluster_id'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? ClusterOsPropertiesIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
