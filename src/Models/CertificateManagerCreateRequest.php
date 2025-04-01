<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CertificateProviderNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CertificateManagerCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        CertificateProviderNameEnum $providerName,
        int $clusterId,
        ?string $requestCallbackUrl = null,
    ) {
        $this->setProviderName($providerName);
        $this->setClusterId($clusterId);
        $this->setRequestCallbackUrl($requestCallbackUrl);
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
            providerName: CertificateProviderNameEnum::tryFrom(Arr::get($data, 'provider_name')),
            clusterId: Arr::get($data, 'cluster_id'),
            requestCallbackUrl: Arr::get($data, 'request_callback_url'),
        ))
            ->setCommonNames(Arr::get($data, 'common_names'));
    }
}
