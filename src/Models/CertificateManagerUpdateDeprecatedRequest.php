<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CertificateProviderNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CertificateManagerUpdateDeprecatedRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $mainCommonName,
        CertificateProviderNameEnum $providerName,
        int $clusterId,
        ?int $certificateId = null,
        ?string $lastRequestTaskCollectionUuid = null,
        ?string $requestCallbackUrl = null,
    ) {
        $this->setId($id);
        $this->setMainCommonName($mainCommonName);
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

    public function getMainCommonName(): string
    {
        return $this->getAttribute('mainCommonName');
    }

    public function setMainCommonName(?string $mainCommonName = null): self
    {
        $this->setAttribute('main_common_name', $mainCommonName);
        return $this;
    }

    public function getCertificateId(): int|null
    {
        return $this->getAttribute('certificateId');
    }

    public function setCertificateId(?int $certificateId = null): self
    {
        $this->setAttribute('certificate_id', $certificateId);
        return $this;
    }

    public function getLastRequestTaskCollectionUuid(): string|null
    {
        return $this->getAttribute('lastRequestTaskCollectionUuid');
    }

    public function setLastRequestTaskCollectionUuid(?string $lastRequestTaskCollectionUuid = null): self
    {
        $this->setAttribute('last_request_task_collection_uuid', $lastRequestTaskCollectionUuid);
        return $this;
    }

    public function getCommonNames(): array
    {
        return $this->getAttribute('commonNames');
    }

    /**
     * @throws ValidationException
     */
    public function setCommonNames(array $commonNames): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($commonNames));
        $this->setAttribute('common_names', $commonNames);
        return $this;
    }

    public function getProviderName(): CertificateProviderNameEnum
    {
        return $this->getAttribute('providerName');
    }

    public function setProviderName(?CertificateProviderNameEnum $providerName = null): self
    {
        $this->setAttribute('provider_name', $providerName);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getRequestCallbackUrl(): string|null
    {
        return $this->getAttribute('requestCallbackUrl');
    }

    public function setRequestCallbackUrl(?string $requestCallbackUrl = null): self
    {
        $this->setAttribute('request_callback_url', $requestCallbackUrl);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            mainCommonName: Arr::get($data, 'main_common_name'),
            providerName: CertificateProviderNameEnum::tryFrom(Arr::get($data, 'provider_name')),
            clusterId: Arr::get($data, 'cluster_id'),
            certificateId: Arr::get($data, 'certificate_id'),
            lastRequestTaskCollectionUuid: Arr::get($data, 'last_request_task_collection_uuid'),
            requestCallbackUrl: Arr::get($data, 'request_callback_url'),
        ))
            ->setCommonNames(Arr::get($data, 'common_names'));
    }
}
