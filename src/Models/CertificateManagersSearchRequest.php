<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CertificateProviderNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CertificateManagersSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getMainCommonName(): string|null
    {
        return $this->getAttribute('main_common_name');
    }

    public function setMainCommonName(?string $mainCommonName): self
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

    public function getCommonNames(): string|null
    {
        return $this->getAttribute('common_names');
    }

    public function setCommonNames(?string $commonNames): self
    {
        $this->setAttribute('common_names', $commonNames);
        return $this;
    }

    public function getProviderName(): CertificateProviderNameEnum|null
    {
        return $this->getAttribute('provider_name');
    }

    public function setProviderName(?CertificateProviderNameEnum $providerName): self
    {
        $this->setAttribute('provider_name', $providerName);
        return $this;
    }

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
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

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'main_common_name'), fn (self $model) => $model->setMainCommonName(Arr::get($data, 'main_common_name')))
            ->when(Arr::has($data, 'certificate_id'), fn (self $model) => $model->setCertificateId(Arr::get($data, 'certificate_id')))
            ->when(Arr::has($data, 'common_names'), fn (self $model) => $model->setCommonNames(Arr::get($data, 'common_names')))
            ->when(Arr::has($data, 'provider_name'), fn (self $model) => $model->setProviderName(Arr::get($data, 'provider_name') !== null ? CertificateProviderNameEnum::tryFrom(Arr::get($data, 'provider_name')) : null))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'request_callback_url'), fn (self $model) => $model->setRequestCallbackUrl(Arr::get($data, 'request_callback_url')));
    }
}
