<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\ShellNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UNIXUserCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        string $username,
        bool $shellIsNamespaced,
        int $clusterId,
        ShellNameEnum $shellName,
        bool $recordUsageFiles,
        ?string $virtualHostsDirectory = null,
        ?string $mailDomainsDirectory = null,
        ?string $password = null,
        ?string $defaultPhpVersion = null,
        ?string $defaultNodejsVersion = null,
        ?string $description = null,
    ) {
        $this->setUsername($username);
        $this->setShellIsNamespaced($shellIsNamespaced);
        $this->setClusterId($clusterId);
        $this->setShellName($shellName);
        $this->setRecordUsageFiles($recordUsageFiles);
        $this->setVirtualHostsDirectory($virtualHostsDirectory);
        $this->setMailDomainsDirectory($mailDomainsDirectory);
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
    public function setUsername(string $username): self
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

    public function setVirtualHostsDirectory(?string $virtualHostsDirectory): self
    {
        $this->setAttribute('virtual_hosts_directory', $virtualHostsDirectory);
        return $this;
    }

    public function getShellIsNamespaced(): bool
    {
        return $this->getAttribute('shell_is_namespaced');
    }

    public function setShellIsNamespaced(bool $shellIsNamespaced): self
    {
        $this->setAttribute('shell_is_namespaced', $shellIsNamespaced);
        return $this;
    }

    public function getMailDomainsDirectory(): string|null
    {
        return $this->getAttribute('mail_domains_directory');
    }

    public function setMailDomainsDirectory(?string $mailDomainsDirectory): self
    {
        $this->setAttribute('mail_domains_directory', $mailDomainsDirectory);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getPassword(): string|null
    {
        return $this->getAttribute('password');
    }

    public function setPassword(?string $password): self
    {
        $this->setAttribute('password', $password);
        return $this;
    }

    public function getShellName(): ShellNameEnum
    {
        return $this->getAttribute('shell_name');
    }

    public function setShellName(ShellNameEnum $shellName): self
    {
        $this->setAttribute('shell_name', $shellName);
        return $this;
    }

    public function getRecordUsageFiles(): bool
    {
        return $this->getAttribute('record_usage_files');
    }

    public function setRecordUsageFiles(bool $recordUsageFiles): self
    {
        $this->setAttribute('record_usage_files', $recordUsageFiles);
        return $this;
    }

    public function getDefaultPhpVersion(): string|null
    {
        return $this->getAttribute('default_php_version');
    }

    public function setDefaultPhpVersion(?string $defaultPhpVersion): self
    {
        $this->setAttribute('default_php_version', $defaultPhpVersion);
        return $this;
    }

    public function getDefaultNodejsVersion(): string|null
    {
        return $this->getAttribute('default_nodejs_version');
    }

    public function setDefaultNodejsVersion(?string $defaultNodejsVersion): self
    {
        $this->setAttribute('default_nodejs_version', $defaultNodejsVersion);
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->getAttribute('description');
    }

    public function setDescription(?string $description): self
    {
        $this->setAttribute('description', $description);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            username: Arr::get($data, 'username'),
            shellIsNamespaced: Arr::get($data, 'shell_is_namespaced'),
            clusterId: Arr::get($data, 'cluster_id'),
            shellName: ShellNameEnum::tryFrom(Arr::get($data, 'shell_name')),
            recordUsageFiles: Arr::get($data, 'record_usage_files'),
            virtualHostsDirectory: Arr::get($data, 'virtual_hosts_directory'),
            mailDomainsDirectory: Arr::get($data, 'mail_domains_directory'),
            password: Arr::get($data, 'password'),
            defaultPhpVersion: Arr::get($data, 'default_php_version'),
            defaultNodejsVersion: Arr::get($data, 'default_nodejs_version'),
            description: Arr::get($data, 'description'),
        ));
    }
}
