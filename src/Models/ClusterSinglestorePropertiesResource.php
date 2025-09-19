<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterSinglestorePropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $singlestoreStudioDomain,
        string $singlestoreApiDomain,
        string $singlestoreLicenseKey,
        string $singlestoreRootPassword,
        int $clusterId,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setSinglestoreStudioDomain($singlestoreStudioDomain);
        $this->setSinglestoreApiDomain($singlestoreApiDomain);
        $this->setSinglestoreLicenseKey($singlestoreLicenseKey);
        $this->setSinglestoreRootPassword($singlestoreRootPassword);
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

    public function getSinglestoreStudioDomain(): string
    {
        return $this->getAttribute('singlestore_studio_domain');
    }

    public function setSinglestoreStudioDomain(?string $singlestoreStudioDomain = null): self
    {
        $this->setAttribute('singlestore_studio_domain', $singlestoreStudioDomain);
        return $this;
    }

    public function getSinglestoreApiDomain(): string
    {
        return $this->getAttribute('singlestore_api_domain');
    }

    public function setSinglestoreApiDomain(?string $singlestoreApiDomain = null): self
    {
        $this->setAttribute('singlestore_api_domain', $singlestoreApiDomain);
        return $this;
    }

    public function getSinglestoreLicenseKey(): string
    {
        return $this->getAttribute('singlestore_license_key');
    }

    /**
     * @throws ValidationException
     */
    public function setSinglestoreLicenseKey(?string $singlestoreLicenseKey = null): self
    {
        Validator::create()
            ->length(min: 144, max: 6144)
            ->regex('/^[ -~]+$/')
            ->assert($singlestoreLicenseKey);
        $this->setAttribute('singlestore_license_key', $singlestoreLicenseKey);
        return $this;
    }

    public function getSinglestoreRootPassword(): string
    {
        return $this->getAttribute('singlestore_root_password');
    }

    /**
     * @throws ValidationException
     */
    public function setSinglestoreRootPassword(?string $singlestoreRootPassword = null): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[a-zA-Z0-9]+$/')
            ->assert($singlestoreRootPassword);
        $this->setAttribute('singlestore_root_password', $singlestoreRootPassword);
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

    public function getIncludes(): ClusterSinglestorePropertiesIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?ClusterSinglestorePropertiesIncludes $includes): self
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
            singlestoreStudioDomain: Arr::get($data, 'singlestore_studio_domain'),
            singlestoreApiDomain: Arr::get($data, 'singlestore_api_domain'),
            singlestoreLicenseKey: Arr::get($data, 'singlestore_license_key'),
            singlestoreRootPassword: Arr::get($data, 'singlestore_root_password'),
            clusterId: Arr::get($data, 'cluster_id'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? ClusterSinglestorePropertiesIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
