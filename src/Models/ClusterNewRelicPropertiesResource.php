<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterNewRelicPropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $newRelicMariadbPassword,
        int $clusterId,
        ?string $newRelicApmLicenseKey = null,
        ?string $newRelicInfrastructureLicenseKey = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setNewRelicMariadbPassword($newRelicMariadbPassword);
        $this->setClusterId($clusterId);
        $this->setNewRelicApmLicenseKey($newRelicApmLicenseKey);
        $this->setNewRelicInfrastructureLicenseKey($newRelicInfrastructureLicenseKey);
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

    public function getNewRelicMariadbPassword(): string
    {
        return $this->getAttribute('new_relic_mariadb_password');
    }

    /**
     * @throws ValidationException
     */
    public function setNewRelicMariadbPassword(?string $newRelicMariadbPassword = null): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[ -~]+$/')
            ->assert($newRelicMariadbPassword);
        $this->setAttribute('new_relic_mariadb_password', $newRelicMariadbPassword);
        return $this;
    }

    public function getNewRelicApmLicenseKey(): string|null
    {
        return $this->getAttribute('new_relic_apm_license_key');
    }

    public function setNewRelicApmLicenseKey(?string $newRelicApmLicenseKey = null): self
    {
        $this->setAttribute('new_relic_apm_license_key', $newRelicApmLicenseKey);
        return $this;
    }

    public function getNewRelicInfrastructureLicenseKey(): string|null
    {
        return $this->getAttribute('new_relic_infrastructure_license_key');
    }

    public function setNewRelicInfrastructureLicenseKey(?string $newRelicInfrastructureLicenseKey = null): self
    {
        $this->setAttribute('new_relic_infrastructure_license_key', $newRelicInfrastructureLicenseKey);
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

    public function getIncludes(): ClusterNewRelicPropertiesIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?ClusterNewRelicPropertiesIncludes $includes): self
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
            newRelicMariadbPassword: Arr::get($data, 'new_relic_mariadb_password'),
            clusterId: Arr::get($data, 'cluster_id'),
            newRelicApmLicenseKey: Arr::get($data, 'new_relic_apm_license_key'),
            newRelicInfrastructureLicenseKey: Arr::get($data, 'new_relic_infrastructure_license_key'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? ClusterNewRelicPropertiesIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
