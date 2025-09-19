<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterKernelcarePropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getKernelcareLicenseKey(): string|null
    {
        return $this->getAttribute('kernelcare_license_key');
    }

    public function setKernelcareLicenseKey(?string $kernelcareLicenseKey): self
    {
        $this->setAttribute('kernelcare_license_key', $kernelcareLicenseKey);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setKernelcareLicenseKey(Arr::get($data, 'kernelcare_license_key'));
    }
}
