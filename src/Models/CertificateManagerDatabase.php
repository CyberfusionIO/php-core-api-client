<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CertificateProviderNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class CertificateManagerDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $mainCommonName,
        array $commonNames,
        CertificateProviderNameEnum $providerName,
        int $clusterId,
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
        $this->setCertificateId($certificateId);
        $this->setLastRequestTaskCollectionUuid($lastRequestTaskCollectionUuid);
        $this->setRequestCallbackUrl($requestCallbackUrl);
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

    public function getMainCommonName(): string
    {
        return $this->getAttribute('mainCommonName');
    }

    public function setMainCommonName(?string $mainCommonName = null): self
    {
        $this->setAttribute('mainCommonName', $mainCommonName);
        return $this;
    }

    public function getCertificateId(): int|null
    {
        return $this->getAttribute('certificateId');
    }

    public function setCertificateId(?int $certificateId = null): self
    {
        $this->setAttribute('certificateId', $certificateId);
        return $this;
    }

    public function getLastRequestTaskCollectionUuid(): string|null
    {
        return $this->getAttribute('lastRequestTaskCollectionUuid');
    }

    public function setLastRequestTaskCollectionUuid(?string $lastRequestTaskCollectionUuid = null): self
    {
        $this->setAttribute('lastRequestTaskCollectionUuid', $lastRequestTaskCollectionUuid);
        return $this;
    }

    public function getCommonNames(): array
    {
        return $this->getAttribute('commonNames');
    }

    /**
     * @throws ValidationException
     */
    public function setCommonNames(?array $commonNames = null): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($commonNames));
        $this->setAttribute('commonNames', $commonNames);
        return $this;
    }

    public function getProviderName(): CertificateProviderNameEnum
    {
        return $this->getAttribute('providerName');
    }

    public function setProviderName(?CertificateProviderNameEnum $providerName = null): self
    {
        $this->setAttribute('providerName', $providerName);
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

    public function getRequestCallbackUrl(): string|null
    {
        return $this->getAttribute('requestCallbackUrl');
    }

    public function setRequestCallbackUrl(?string $requestCallbackUrl = null): self
    {
        $this->setAttribute('requestCallbackUrl', $requestCallbackUrl);
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
            certificateId: Arr::get($data, 'certificate_id'),
            lastRequestTaskCollectionUuid: Arr::get($data, 'last_request_task_collection_uuid'),
            requestCallbackUrl: Arr::get($data, 'request_callback_url'),
        ));
    }
}
