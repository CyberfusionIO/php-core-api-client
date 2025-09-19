<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterSinglestorePropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getSinglestoreStudioDomain(): string|null
    {
        return $this->getAttribute('singlestore_studio_domain');
    }

    public function setSinglestoreStudioDomain(?string $singlestoreStudioDomain): self
    {
        $this->setAttribute('singlestore_studio_domain', $singlestoreStudioDomain);
        return $this;
    }

    public function getSinglestoreApiDomain(): string|null
    {
        return $this->getAttribute('singlestore_api_domain');
    }

    public function setSinglestoreApiDomain(?string $singlestoreApiDomain): self
    {
        $this->setAttribute('singlestore_api_domain', $singlestoreApiDomain);
        return $this;
    }

    public function getSinglestoreLicenseKey(): string|null
    {
        return $this->getAttribute('singlestore_license_key');
    }

    public function setSinglestoreLicenseKey(?string $singlestoreLicenseKey): self
    {
        $this->setAttribute('singlestore_license_key', $singlestoreLicenseKey);
        return $this;
    }

    public function getSinglestoreRootPassword(): string|null
    {
        return $this->getAttribute('singlestore_root_password');
    }

    public function setSinglestoreRootPassword(?string $singlestoreRootPassword): self
    {
        $this->setAttribute('singlestore_root_password', $singlestoreRootPassword);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setSinglestoreStudioDomain(Arr::get($data, 'singlestore_studio_domain'))
            ->setSinglestoreApiDomain(Arr::get($data, 'singlestore_api_domain'))
            ->setSinglestoreLicenseKey(Arr::get($data, 'singlestore_license_key'))
            ->setSinglestoreRootPassword(Arr::get($data, 'singlestore_root_password'));
    }
}
