<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\ShellPathEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UNIXUserResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $username,
        int $unixId,
        string $homeDirectory,
        string $sshDirectory,
        int $clusterId,
        ShellPathEnum $shellPath,
        bool $recordUsageFiles,
        ?string $password = null,
        ?string $virtualHostsDirectory = null,
        ?string $mailDomainsDirectory = null,
        ?string $borgRepositoriesDirectory = null,
        ?string $defaultPhpVersion = null,
        ?string $defaultNodejsVersion = null,
        ?string $description = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setUsername($username);
        $this->setUnixId($unixId);
        $this->setHomeDirectory($homeDirectory);
        $this->setSshDirectory($sshDirectory);
        $this->setClusterId($clusterId);
        $this->setShellPath($shellPath);
        $this->setRecordUsageFiles($recordUsageFiles);
        $this->setPassword($password);
        $this->setVirtualHostsDirectory($virtualHostsDirectory);
        $this->setMailDomainsDirectory($mailDomainsDirectory);
        $this->setBorgRepositoriesDirectory($borgRepositoriesDirectory);
        $this->setDefaultPhpVersion($defaultPhpVersion);
        $this->setDefaultNodejsVersion($defaultNodejsVersion);
        $this->setDescription($description);
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
        $this->setAttribute('createdAt', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updatedAt', $updatedAt);
        return $this;
    }

    public function getPassword(): string|null
    {
        return $this->getAttribute('password');
    }

    public function setPassword(?string $password = null): self
    {
        $this->setAttribute('password', $password);
        return $this;
    }

    public function getUsername(): string
    {
        return $this->getAttribute('username');
    }

    /**
     * @throws ValidationException
     */
    public function setUsername(?string $username = null): self
    {
        Validator::create()
            ->length(min: 1, max: 32)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($username);
        $this->setAttribute('username', $username);
        return $this;
    }

    public function getUnixId(): int
    {
        return $this->getAttribute('unixId');
    }

    public function setUnixId(?int $unixId = null): self
    {
        $this->setAttribute('unixId', $unixId);
        return $this;
    }

    public function getHomeDirectory(): string
    {
        return $this->getAttribute('homeDirectory');
    }

    public function setHomeDirectory(?string $homeDirectory = null): self
    {
        $this->setAttribute('homeDirectory', $homeDirectory);
        return $this;
    }

    public function getSshDirectory(): string
    {
        return $this->getAttribute('sshDirectory');
    }

    public function setSshDirectory(?string $sshDirectory = null): self
    {
        $this->setAttribute('sshDirectory', $sshDirectory);
        return $this;
    }

    public function getVirtualHostsDirectory(): string|null
    {
        return $this->getAttribute('virtualHostsDirectory');
    }

    public function setVirtualHostsDirectory(?string $virtualHostsDirectory = null): self
    {
        $this->setAttribute('virtualHostsDirectory', $virtualHostsDirectory);
        return $this;
    }

    public function getMailDomainsDirectory(): string|null
    {
        return $this->getAttribute('mailDomainsDirectory');
    }

    public function setMailDomainsDirectory(?string $mailDomainsDirectory = null): self
    {
        $this->setAttribute('mailDomainsDirectory', $mailDomainsDirectory);
        return $this;
    }

    public function getBorgRepositoriesDirectory(): string|null
    {
        return $this->getAttribute('borgRepositoriesDirectory');
    }

    public function setBorgRepositoriesDirectory(?string $borgRepositoriesDirectory = null): self
    {
        $this->setAttribute('borgRepositoriesDirectory', $borgRepositoriesDirectory);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('clusterId', $clusterId);
        return $this;
    }

    public function getShellPath(): ShellPathEnum
    {
        return $this->getAttribute('shellPath');
    }

    public function setShellPath(?ShellPathEnum $shellPath = null): self
    {
        $this->setAttribute('shellPath', $shellPath);
        return $this;
    }

    public function getRecordUsageFiles(): bool
    {
        return $this->getAttribute('recordUsageFiles');
    }

    public function setRecordUsageFiles(?bool $recordUsageFiles = null): self
    {
        $this->setAttribute('recordUsageFiles', $recordUsageFiles);
        return $this;
    }

    public function getDefaultPhpVersion(): string|null
    {
        return $this->getAttribute('defaultPhpVersion');
    }

    public function setDefaultPhpVersion(?string $defaultPhpVersion = null): self
    {
        $this->setAttribute('defaultPhpVersion', $defaultPhpVersion);
        return $this;
    }

    public function getDefaultNodejsVersion(): string|null
    {
        return $this->getAttribute('defaultNodejsVersion');
    }

    public function setDefaultNodejsVersion(?string $defaultNodejsVersion = null): self
    {
        $this->setAttribute('defaultNodejsVersion', $defaultNodejsVersion);
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->getAttribute('description');
    }

    public function setDescription(?string $description = null): self
    {
        $this->setAttribute('description', $description);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            username: Arr::get($data, 'username'),
            unixId: Arr::get($data, 'unix_id'),
            homeDirectory: Arr::get($data, 'home_directory'),
            sshDirectory: Arr::get($data, 'ssh_directory'),
            clusterId: Arr::get($data, 'cluster_id'),
            shellPath: ShellPathEnum::tryFrom(Arr::get($data, 'shell_path')),
            recordUsageFiles: Arr::get($data, 'record_usage_files'),
            password: Arr::get($data, 'password'),
            virtualHostsDirectory: Arr::get($data, 'virtual_hosts_directory'),
            mailDomainsDirectory: Arr::get($data, 'mail_domains_directory'),
            borgRepositoriesDirectory: Arr::get($data, 'borg_repositories_directory'),
            defaultPhpVersion: Arr::get($data, 'default_php_version'),
            defaultNodejsVersion: Arr::get($data, 'default_nodejs_version'),
            description: Arr::get($data, 'description'),
        ));
    }
}
