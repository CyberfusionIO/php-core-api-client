<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CMSInstallWordPressRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $databaseName,
        string $databaseUserName,
        string $databaseUserPassword,
        string $databaseHost,
        string $adminUsername,
        string $adminPassword,
        string $siteTitle,
        string $siteUrl,
        string $locale,
        string $version,
        string $adminEmailAddress,
    ) {
        $this->setDatabaseName($databaseName);
        $this->setDatabaseUserName($databaseUserName);
        $this->setDatabaseUserPassword($databaseUserPassword);
        $this->setDatabaseHost($databaseHost);
        $this->setAdminUsername($adminUsername);
        $this->setAdminPassword($adminPassword);
        $this->setSiteTitle($siteTitle);
        $this->setSiteUrl($siteUrl);
        $this->setLocale($locale);
        $this->setVersion($version);
        $this->setAdminEmailAddress($adminEmailAddress);
    }

    public function getDatabaseName(): string
    {
        return $this->getAttribute('databaseName');
    }

    /**
     * @throws ValidationException
     */
    public function setDatabaseName(?string $databaseName = null): self
    {
        Validator::create()
            ->length(min: 1, max: 63)
            ->regex('/^[a-zA-Z0-9-_]+$/')
            ->assert($databaseName);
        $this->setAttribute('database_name', $databaseName);
        return $this;
    }

    public function getDatabaseUserName(): string
    {
        return $this->getAttribute('databaseUserName');
    }

    /**
     * @throws ValidationException
     */
    public function setDatabaseUserName(?string $databaseUserName = null): self
    {
        Validator::create()
            ->length(min: 1, max: 63)
            ->regex('/^[a-zA-Z0-9-_]+$/')
            ->assert($databaseUserName);
        $this->setAttribute('database_user_name', $databaseUserName);
        return $this;
    }

    public function getDatabaseUserPassword(): string
    {
        return $this->getAttribute('databaseUserPassword');
    }

    /**
     * @throws ValidationException
     */
    public function setDatabaseUserPassword(?string $databaseUserPassword = null): self
    {
        Validator::create()
            ->length(min: 1, max: 255)
            ->regex('/^[ -~]+$/')
            ->assert($databaseUserPassword);
        $this->setAttribute('database_user_password', $databaseUserPassword);
        return $this;
    }

    public function getDatabaseHost(): string
    {
        return $this->getAttribute('databaseHost');
    }

    public function setDatabaseHost(?string $databaseHost = null): self
    {
        $this->setAttribute('database_host', $databaseHost);
        return $this;
    }

    public function getAdminUsername(): string
    {
        return $this->getAttribute('adminUsername');
    }

    /**
     * @throws ValidationException
     */
    public function setAdminUsername(?string $adminUsername = null): self
    {
        Validator::create()
            ->length(min: 1, max: 60)
            ->regex('/^[a-zA-Z0-9-_]+$/')
            ->assert($adminUsername);
        $this->setAttribute('admin_username', $adminUsername);
        return $this;
    }

    public function getAdminPassword(): string
    {
        return $this->getAttribute('adminPassword');
    }

    /**
     * @throws ValidationException
     */
    public function setAdminPassword(?string $adminPassword = null): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[ -~]+$/')
            ->assert($adminPassword);
        $this->setAttribute('admin_password', $adminPassword);
        return $this;
    }

    public function getSiteTitle(): string
    {
        return $this->getAttribute('siteTitle');
    }

    /**
     * @throws ValidationException
     */
    public function setSiteTitle(?string $siteTitle = null): self
    {
        Validator::create()
            ->length(min: 1, max: 253)
            ->regex('/^[a-zA-Z0-9-_ ]+$/')
            ->assert($siteTitle);
        $this->setAttribute('site_title', $siteTitle);
        return $this;
    }

    public function getSiteUrl(): string
    {
        return $this->getAttribute('siteUrl');
    }

    /**
     * @throws ValidationException
     */
    public function setSiteUrl(?string $siteUrl = null): self
    {
        Validator::create()
            ->length(min: 1, max: 2083)
            ->assert($siteUrl);
        $this->setAttribute('site_url', $siteUrl);
        return $this;
    }

    public function getLocale(): string
    {
        return $this->getAttribute('locale');
    }

    /**
     * @throws ValidationException
     */
    public function setLocale(?string $locale = null): self
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
    public function setVersion(?string $version = null): self
    {
        Validator::create()
            ->length(min: 1, max: 6)
            ->regex('/^[0-9.]+$/')
            ->assert($version);
        $this->setAttribute('version', $version);
        return $this;
    }

    public function getAdminEmailAddress(): string
    {
        return $this->getAttribute('adminEmailAddress');
    }

    public function setAdminEmailAddress(?string $adminEmailAddress = null): self
    {
        $this->setAttribute('admin_email_address', $adminEmailAddress);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            databaseName: Arr::get($data, 'database_name'),
            databaseUserName: Arr::get($data, 'database_user_name'),
            databaseUserPassword: Arr::get($data, 'database_user_password'),
            databaseHost: Arr::get($data, 'database_host'),
            adminUsername: Arr::get($data, 'admin_username'),
            adminPassword: Arr::get($data, 'admin_password'),
            siteTitle: Arr::get($data, 'site_title'),
            siteUrl: Arr::get($data, 'site_url'),
            locale: Arr::get($data, 'locale'),
            version: Arr::get($data, 'version'),
            adminEmailAddress: Arr::get($data, 'admin_email_address'),
        ));
    }
}
