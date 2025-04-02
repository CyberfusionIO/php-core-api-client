<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class BorgRepositoryDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $name,
        string $passphrase,
        string $remoteHost,
        string $remotePath,
        string $remoteUsername,
        int $clusterId,
        ?int $unixUserId = null,
        ?int $keepHourly = null,
        ?int $keepDaily = null,
        ?int $keepWeekly = null,
        ?int $keepMonthly = null,
        ?int $keepYearly = null,
        ?string $identityFilePath = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setName($name);
        $this->setPassphrase($passphrase);
        $this->setRemoteHost($remoteHost);
        $this->setRemotePath($remotePath);
        $this->setRemoteUsername($remoteUsername);
        $this->setClusterId($clusterId);
        $this->setUnixUserId($unixUserId);
        $this->setKeepHourly($keepHourly);
        $this->setKeepDaily($keepDaily);
        $this->setKeepWeekly($keepWeekly);
        $this->setKeepMonthly($keepMonthly);
        $this->setKeepYearly($keepYearly);
        $this->setIdentityFilePath($identityFilePath);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('createdAt');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(?string $name = null): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getPassphrase(): string
    {
        return $this->getAttribute('passphrase');
    }

    /**
     * @throws ValidationException
     */
    public function setPassphrase(?string $passphrase = null): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[ -~]+$/')
            ->assert($passphrase);
        $this->setAttribute('passphrase', $passphrase);
        return $this;
    }

    public function getRemoteHost(): string
    {
        return $this->getAttribute('remoteHost');
    }

    public function setRemoteHost(?string $remoteHost = null): self
    {
        $this->setAttribute('remote_host', $remoteHost);
        return $this;
    }

    public function getRemotePath(): string
    {
        return $this->getAttribute('remotePath');
    }

    public function setRemotePath(?string $remotePath = null): self
    {
        $this->setAttribute('remote_path', $remotePath);
        return $this;
    }

    public function getRemoteUsername(): string
    {
        return $this->getAttribute('remoteUsername');
    }

    /**
     * @throws ValidationException
     */
    public function setRemoteUsername(?string $remoteUsername = null): self
    {
        Validator::create()
            ->length(min: 1, max: 32)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($remoteUsername);
        $this->setAttribute('remote_username', $remoteUsername);
        return $this;
    }

    public function getUnixUserId(): int|null
    {
        return $this->getAttribute('unixUserId');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getKeepHourly(): int|null
    {
        return $this->getAttribute('keepHourly');
    }

    public function setKeepHourly(?int $keepHourly = null): self
    {
        $this->setAttribute('keep_hourly', $keepHourly);
        return $this;
    }

    public function getKeepDaily(): int|null
    {
        return $this->getAttribute('keepDaily');
    }

    public function setKeepDaily(?int $keepDaily = null): self
    {
        $this->setAttribute('keep_daily', $keepDaily);
        return $this;
    }

    public function getKeepWeekly(): int|null
    {
        return $this->getAttribute('keepWeekly');
    }

    public function setKeepWeekly(?int $keepWeekly = null): self
    {
        $this->setAttribute('keep_weekly', $keepWeekly);
        return $this;
    }

    public function getKeepMonthly(): int|null
    {
        return $this->getAttribute('keepMonthly');
    }

    public function setKeepMonthly(?int $keepMonthly = null): self
    {
        $this->setAttribute('keep_monthly', $keepMonthly);
        return $this;
    }

    public function getKeepYearly(): int|null
    {
        return $this->getAttribute('keepYearly');
    }

    public function setKeepYearly(?int $keepYearly = null): self
    {
        $this->setAttribute('keep_yearly', $keepYearly);
        return $this;
    }

    public function getIdentityFilePath(): string|null
    {
        return $this->getAttribute('identityFilePath');
    }

    public function setIdentityFilePath(?string $identityFilePath = null): self
    {
        $this->setAttribute('identity_file_path', $identityFilePath);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            name: Arr::get($data, 'name'),
            passphrase: Arr::get($data, 'passphrase'),
            remoteHost: Arr::get($data, 'remote_host'),
            remotePath: Arr::get($data, 'remote_path'),
            remoteUsername: Arr::get($data, 'remote_username'),
            clusterId: Arr::get($data, 'cluster_id'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            keepHourly: Arr::get($data, 'keep_hourly'),
            keepDaily: Arr::get($data, 'keep_daily'),
            keepWeekly: Arr::get($data, 'keep_weekly'),
            keepMonthly: Arr::get($data, 'keep_monthly'),
            keepYearly: Arr::get($data, 'keep_yearly'),
            identityFilePath: Arr::get($data, 'identity_file_path'),
        ));
    }
}
