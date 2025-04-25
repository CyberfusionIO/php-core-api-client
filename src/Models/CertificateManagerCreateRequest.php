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
        array $commonNames,
        CertificateProviderNameEnum $providerName,
        int $clusterId,
        ?string $requestCallbackUrl = null,
    ) {
        $this->setCommonNames($commonNames);
        $this->setProviderName($providerName);
        $this->setClusterId($clusterId);
        $this->setRequestCallbackUrl($requestCallbackUrl);
    }

    public function getCommonNames(): array
    {
        return $this->getAttribute('common_names');
    }

    /**
     * @throws ValidationException
     */
    public function setCommonNames(array $commonNames = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($commonNames));
        $this->setAttribute('common_names', $commonNames);
        return $this;
    }

    public function getProviderName(): CertificateProviderNameEnum
    {
        return $this->getAttribute('provider_name');
    }

    public function setProviderName(?CertificateProviderNameEnum $providerName = null): self
    {
        $this->setAttribute('provider_name', $providerName);
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

    public function getRequestCallbackUrl(): string|null
    {
        return $this->getAttribute('request_callback_url');
    }

    public function setRequestCallbackUrl(?string $requestCallbackUrl = null): self
    {
        $this->setAttribute('request_callback_url', $requestCallbackUrl);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            commonNames: Arr::get($data, 'common_names'),
            providerName: CertificateProviderNameEnum::tryFrom(Arr::get($data, 'provider_name')),
            clusterId: Arr::get($data, 'cluster_id'),
            requestCallbackUrl: Arr::get($data, 'request_callback_url'),
        ));
    }
}
