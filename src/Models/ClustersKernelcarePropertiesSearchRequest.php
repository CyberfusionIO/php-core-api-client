<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClustersKernelcarePropertiesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getKernelcareLicenseKey(): string|null
    {
        return $this->getAttribute('kernelcare_license_key');
    }

    public function setKernelcareLicenseKey(?string $kernelcareLicenseKey): self
    {
        $this->setAttribute('kernelcare_license_key', $kernelcareLicenseKey);
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

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'kernelcare_license_key'), fn (self $model) => $model->setKernelcareLicenseKey(Arr::get($data, 'kernelcare_license_key')))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')));
    }
}
