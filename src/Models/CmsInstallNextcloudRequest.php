<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CmsInstallNextcloudRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        string $databaseName,
        string $databaseUserName,
        string $databaseUserPassword,
        string $databaseHost,
        string $adminUsername,
        string $adminPassword,
    ) {
        $this->setDatabaseName($databaseName);
        $this->setDatabaseUserName($databaseUserName);
        $this->setDatabaseUserPassword($databaseUserPassword);
        $this->setDatabaseHost($databaseHost);
        $this->setAdminUsername($adminUsername);
        $this->setAdminPassword($adminPassword);
    }

    public function getDatabaseName(): string
    {
        return $this->getAttribute('database_name');
    }

    /**
     * @throws ValidationException
     */
    public function setDatabaseName(string $databaseName): self
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
        return $this->getAttribute('database_user_name');
    }

    /**
     * @throws ValidationException
     */
    public function setDatabaseUserName(string $databaseUserName): self
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
        return $this->getAttribute('database_user_password');
    }

    /**
     * @throws ValidationException
     */
    public function setDatabaseUserPassword(string $databaseUserPassword): self
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
        return $this->getAttribute('database_host');
    }

    public function setDatabaseHost(string $databaseHost): self
    {
        $this->setAttribute('database_host', $databaseHost);
        return $this;
    }

    public function getAdminUsername(): string
    {
        return $this->getAttribute('admin_username');
    }

    /**
     * @throws ValidationException
     */
    public function setAdminUsername(string $adminUsername): self
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
        return $this->getAttribute('admin_password');
    }

    /**
     * @throws ValidationException
     */
    public function setAdminPassword(string $adminPassword): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[ -~]+$/')
            ->assert($adminPassword);
        $this->setAttribute('admin_password', $adminPassword);
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
        ));
    }
}
