<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterNewRelicPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getNewRelicApmLicenseKey(): string|null
    {
        return $this->getAttribute('new_relic_apm_license_key');
    }

    public function setNewRelicApmLicenseKey(?string $newRelicApmLicenseKey): self
    {
        $this->setAttribute('new_relic_apm_license_key', $newRelicApmLicenseKey);
        return $this;
    }

    public function getNewRelicInfrastructureLicenseKey(): string|null
    {
        return $this->getAttribute('new_relic_infrastructure_license_key');
    }

    public function setNewRelicInfrastructureLicenseKey(?string $newRelicInfrastructureLicenseKey): self
    {
        $this->setAttribute('new_relic_infrastructure_license_key', $newRelicInfrastructureLicenseKey);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'new_relic_apm_license_key'), fn (self $model) => $model->setNewRelicApmLicenseKey(Arr::get($data, 'new_relic_apm_license_key')))
            ->when(Arr::has($data, 'new_relic_infrastructure_license_key'), fn (self $model) => $model->setNewRelicInfrastructureLicenseKey(Arr::get($data, 'new_relic_infrastructure_license_key')));
    }
}
