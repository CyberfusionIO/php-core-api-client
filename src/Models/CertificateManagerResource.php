<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CertificateProviderNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CertificateManagerResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $mainCommonName,
        array $commonNames,
        CertificateProviderNameEnum $providerName,
        int $clusterId,
        CertificateManagerIncludes $includes,
        ?int $certificateId = null,
        ?string $lastRequestTaskCollectionUuid = null,
        ?string $requestCallbackUrl = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setMainCommonName($mainCommonName);
        $this->setCommonNames($commonNames);
        $this->setProviderName($providerName);
        $this->setClusterId($clusterId);
        $this->setIncludes($includes);
        $this->setCertificateId($certificateId);
        $this->setLastRequestTaskCollectionUuid($lastRequestTaskCollectionUuid);
        $this->setRequestCallbackUrl($requestCallbackUrl);
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

    public function getMainCommonName(): string
    {
        return $this->getAttribute('main_common_name');
    }

    public function setMainCommonName(string $mainCommonName): self
    {
        $this->setAttribute('main_common_name', $mainCommonName);
        return $this;
    }

    public function getCertificateId(): int|null
    {
        return $this->getAttribute('certificate_id');
    }

    public function setCertificateId(?int $certificateId): self
    {
        $this->setAttribute('certificate_id', $certificateId);
        return $this;
    }

    public function getLastRequestTaskCollectionUuid(): string|null
    {
        return $this->getAttribute('last_request_task_collection_uuid');
    }

    public function setLastRequestTaskCollectionUuid(?string $lastRequestTaskCollectionUuid): self
    {
        $this->setAttribute('last_request_task_collection_uuid', $lastRequestTaskCollectionUuid);
        return $this;
    }

    public function getCommonNames(): array
    {
        return $this->getAttribute('common_names');
    }

    /**
     * @throws ValidationException
     */
    public function setCommonNames(array $commonNames): self
    {
        Validator::create()
            ->unique()
            ->assert($commonNames);
        $this->setAttribute('common_names', $commonNames);
        return $this;
    }

    public function getProviderName(): CertificateProviderNameEnum
    {
        return $this->getAttribute('provider_name');
    }

    public function setProviderName(CertificateProviderNameEnum $providerName): self
    {
        $this->setAttribute('provider_name', $providerName);
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

    public function getRequestCallbackUrl(): string|null
    {
        return $this->getAttribute('request_callback_url');
    }

    public function setRequestCallbackUrl(?string $requestCallbackUrl): self
    {
        $this->setAttribute('request_callback_url', $requestCallbackUrl);
        return $this;
    }

    public function getIncludes(): CertificateManagerIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(CertificateManagerIncludes $includes): self
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
            mainCommonName: Arr::get($data, 'main_common_name'),
            commonNames: Arr::get($data, 'common_names'),
            providerName: CertificateProviderNameEnum::tryFrom(Arr::get($data, 'provider_name')),
            clusterId: Arr::get($data, 'cluster_id'),
            includes: CertificateManagerIncludes::fromArray(Arr::get($data, 'includes')),
            certificateId: Arr::get($data, 'certificate_id'),
            lastRequestTaskCollectionUuid: Arr::get($data, 'last_request_task_collection_uuid'),
            requestCallbackUrl: Arr::get($data, 'request_callback_url'),
        ));
    }
}
