<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\ShellPathEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UNIXUserCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $username,
        int $clusterId,
        ShellPathEnum $shellPath,
        bool $recordUsageFiles,
        ?string $virtualHostsDirectory = null,
        ?string $mailDomainsDirectory = null,
        ?string $borgRepositoriesDirectory = null,
        ?string $password = null,
        ?string $defaultPhpVersion = null,
        ?string $defaultNodejsVersion = null,
        ?string $description = null,
    ) {
        $this->setUsername($username);
        $this->setClusterId($clusterId);
        $this->setShellPath($shellPath);
        $this->setRecordUsageFiles($recordUsageFiles);
        $this->setVirtualHostsDirectory($virtualHostsDirectory);
        $this->setMailDomainsDirectory($mailDomainsDirectory);
        $this->setBorgRepositoriesDirectory($borgRepositoriesDirectory);
        $this->setPassword($password);
        $this->setDefaultPhpVersion($defaultPhpVersion);
        $this->setDefaultNodejsVersion($defaultNodejsVersion);
        $this->setDescription($description);
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

    public function getVirtualHostsDirectory(): string|null
    {
        return $this->getAttribute('virtual_hosts_directory');
    }

    public function setVirtualHostsDirectory(?string $virtualHostsDirectory = null): self
    {
        $this->setAttribute('virtual_hosts_directory', $virtualHostsDirectory);
        return $this;
    }

    public function getMailDomainsDirectory(): string|null
    {
        return $this->getAttribute('mail_domains_directory');
    }

    public function setMailDomainsDirectory(?string $mailDomainsDirectory = null): self
    {
        $this->setAttribute('mail_domains_directory', $mailDomainsDirectory);
        return $this;
    }

    public function getBorgRepositoriesDirectory(): string|null
    {
        return $this->getAttribute('borg_repositories_directory');
    }

    public function setBorgRepositoriesDirectory(?string $borgRepositoriesDirectory = null): self
    {
        $this->setAttribute('borg_repositories_directory', $borgRepositoriesDirectory);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
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

    public function getShellPath(): ShellPathEnum
    {
        return $this->getAttribute('shell_path');
    }

    public function setShellPath(?ShellPathEnum $shellPath = null): self
    {
        $this->setAttribute('shell_path', $shellPath);
        return $this;
    }

    public function getRecordUsageFiles(): bool
    {
        return $this->getAttribute('record_usage_files');
    }

    public function setRecordUsageFiles(?bool $recordUsageFiles = null): self
    {
        $this->setAttribute('record_usage_files', $recordUsageFiles);
        return $this;
    }

    public function getDefaultPhpVersion(): string|null
    {
        return $this->getAttribute('default_php_version');
    }

    public function setDefaultPhpVersion(?string $defaultPhpVersion = null): self
    {
        $this->setAttribute('default_php_version', $defaultPhpVersion);
        return $this;
    }

    public function getDefaultNodejsVersion(): string|null
    {
        return $this->getAttribute('default_nodejs_version');
    }

    public function setDefaultNodejsVersion(?string $defaultNodejsVersion = null): self
    {
        $this->setAttribute('default_nodejs_version', $defaultNodejsVersion);
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
            username: Arr::get($data, 'username'),
            clusterId: Arr::get($data, 'cluster_id'),
            shellPath: ShellPathEnum::tryFrom(Arr::get($data, 'shell_path')),
            recordUsageFiles: Arr::get($data, 'record_usage_files'),
            virtualHostsDirectory: Arr::get($data, 'virtual_hosts_directory'),
            mailDomainsDirectory: Arr::get($data, 'mail_domains_directory'),
            borgRepositoriesDirectory: Arr::get($data, 'borg_repositories_directory'),
            password: Arr::get($data, 'password'),
            defaultPhpVersion: Arr::get($data, 'default_php_version'),
            defaultNodejsVersion: Arr::get($data, 'default_nodejs_version'),
            description: Arr::get($data, 'description'),
        ));
    }
}
