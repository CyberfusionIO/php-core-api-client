<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CmsAutoInstallWordpressRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $siteTitle, string $locale, string $version, string $adminEmailAddress)
    {
        $this->setSiteTitle($siteTitle);
        $this->setLocale($locale);
        $this->setVersion($version);
        $this->setAdminEmailAddress($adminEmailAddress);
    }

    public function getSiteTitle(): string
    {
        return $this->getAttribute('site_title');
    }

    /**
     * @throws ValidationException
     */
    public function setSiteTitle(string $siteTitle): self
    {
        Validator::create()
            ->length(min: 1, max: 253)
            ->regex('/^[a-zA-Z0-9-_ ]+$/')
            ->assert($siteTitle);
        $this->setAttribute('site_title', $siteTitle);
        return $this;
    }

    public function getLocale(): string
    {
        return $this->getAttribute('locale');
    }

    /**
     * @throws ValidationException
     */
    public function setLocale(string $locale): self
    {
        Validator::create()
            ->length(min: 1, max: 15)
            ->regex('/^[a-zA-Z_]+$/')
            ->assert($locale);
        $this->setAttribute('locale', $locale);
        return $this;
    }

    public function getVersion(): string
    {
        return $this->getAttribute('version');
    }

    /**
     * @throws ValidationException
     */
    public function setVersion(string $version): self
    {
        Validator::create()
            ->length(min: 1, max: 20)
            ->regex('/^[0-9.]+$/')
            ->assert($version);
        $this->setAttribute('version', $version);
        return $this;
    }

    public function getAdminEmailAddress(): string
    {
        return $this->getAttribute('admin_email_address');
    }

    public function setAdminEmailAddress(string $adminEmailAddress): self
    {
        $this->setAttribute('admin_email_address', $adminEmailAddress);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            siteTitle: Arr::get($data, 'site_title'),
            locale: Arr::get($data, 'locale'),
            version: Arr::get($data, 'version'),
            adminEmailAddress: Arr::get($data, 'admin_email_address'),
        ));
    }
}
