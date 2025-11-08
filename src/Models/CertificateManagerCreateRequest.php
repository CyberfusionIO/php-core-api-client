<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CertificateProviderNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CertificateManagerCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(array $commonNames, int $clusterId)
    {
        $this->setCommonNames($commonNames);
        $this->setClusterId($clusterId);
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

    public static function fromArray(array $data): self
    {
        return (new self(
            commonNames: Arr::get($data, 'common_names'),
            clusterId: Arr::get($data, 'cluster_id'),
        ))
            ->when(Arr::has($data, 'provider_name'), fn (self $model) => $model->setProviderName(CertificateProviderNameEnum::tryFrom(Arr::get($data, 'provider_name', 'lets_encrypt'))))
            ->when(Arr::has($data, 'request_callback_url'), fn (self $model) => $model->setRequestCallbackUrl(Arr::get($data, 'request_callback_url')));
    }
}
