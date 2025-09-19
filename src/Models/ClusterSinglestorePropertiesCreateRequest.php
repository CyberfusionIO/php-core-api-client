<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterSinglestorePropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $singlestoreStudioDomain,
        string $singlestoreApiDomain,
        string $singlestoreLicenseKey,
        string $singlestoreRootPassword,
    ) {
        $this->setSinglestoreStudioDomain($singlestoreStudioDomain);
        $this->setSinglestoreApiDomain($singlestoreApiDomain);
        $this->setSinglestoreLicenseKey($singlestoreLicenseKey);
        $this->setSinglestoreRootPassword($singlestoreRootPassword);
    }

    public function getSinglestoreStudioDomain(): string
    {
        return $this->getAttribute('singlestore_studio_domain');
    }

    public function setSinglestoreStudioDomain(?string $singlestoreStudioDomain = null): self
    {
        $this->setAttribute('singlestore_studio_domain', $singlestoreStudioDomain);
        return $this;
    }

    public function getSinglestoreApiDomain(): string
    {
        return $this->getAttribute('singlestore_api_domain');
    }

    public function setSinglestoreApiDomain(?string $singlestoreApiDomain = null): self
    {
        $this->setAttribute('singlestore_api_domain', $singlestoreApiDomain);
        return $this;
    }

    public function getSinglestoreLicenseKey(): string
    {
        return $this->getAttribute('singlestore_license_key');
    }

    /**
     * @throws ValidationException
     */
    public function setSinglestoreLicenseKey(?string $singlestoreLicenseKey = null): self
    {
        Validator::create()
            ->length(min: 144, max: 144)
            ->regex('/^[ -~]+$/')
            ->assert($singlestoreLicenseKey);
        $this->setAttribute('singlestore_license_key', $singlestoreLicenseKey);
        return $this;
    }

    public function getSinglestoreRootPassword(): string
    {
        return $this->getAttribute('singlestore_root_password');
    }

    /**
     * @throws ValidationException
     */
    public function setSinglestoreRootPassword(?string $singlestoreRootPassword = null): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[a-zA-Z0-9]+$/')
            ->assert($singlestoreRootPassword);
        $this->setAttribute('singlestore_root_password', $singlestoreRootPassword);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            singlestoreStudioDomain: Arr::get($data, 'singlestore_studio_domain'),
            singlestoreApiDomain: Arr::get($data, 'singlestore_api_domain'),
            singlestoreLicenseKey: Arr::get($data, 'singlestore_license_key'),
            singlestoreRootPassword: Arr::get($data, 'singlestore_root_password'),
        ));
    }
}
