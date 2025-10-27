<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterKernelcarePropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $kernelcareLicenseKey)
    {
        $this->setKernelcareLicenseKey($kernelcareLicenseKey);
    }

    public function getKernelcareLicenseKey(): string
    {
        return $this->getAttribute('kernelcare_license_key');
    }

    /**
     * @throws ValidationException
     */
    public function setKernelcareLicenseKey(string $kernelcareLicenseKey): self
    {
        Validator::create()
            ->length(min: 16, max: 16)
            ->regex('/^[a-zA-Z0-9]+$/')
            ->assert($kernelcareLicenseKey);
        $this->setAttribute('kernelcare_license_key', $kernelcareLicenseKey);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            kernelcareLicenseKey: Arr::get($data, 'kernelcare_license_key'),
        ));
    }
}
