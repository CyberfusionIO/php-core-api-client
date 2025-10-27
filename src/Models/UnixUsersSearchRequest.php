<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\ShellNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UnixUsersSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getUsername(): string|null
    {
        return $this->getAttribute('username');
    }

    public function setUsername(?string $username): self
    {
        $this->setAttribute('username', $username);
        return $this;
    }

    public function getUnixId(): int|null
    {
        return $this->getAttribute('unix_id');
    }

    public function setUnixId(?int $unixId): self
    {
        $this->setAttribute('unix_id', $unixId);
        return $this;
    }

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getShellName(): ShellNameEnum|null
    {
        return $this->getAttribute('shell_name');
    }

    public function setShellName(?ShellNameEnum $shellName): self
    {
        $this->setAttribute('shell_name', $shellName);
        return $this;
    }

    public function getRecordUsageFiles(): bool|null
    {
        return $this->getAttribute('record_usage_files');
    }

    public function setRecordUsageFiles(?bool $recordUsageFiles): self
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
        ))
            ->when(Arr::has($data, 'username'), fn (self $model) => $model->setUsername(Arr::get($data, 'username')))
            ->when(Arr::has($data, 'unix_id'), fn (self $model) => $model->setUnixId(Arr::get($data, 'unix_id')))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'shell_name'), fn (self $model) => $model->setShellName(Arr::get($data, 'shell_name') !== null ? ShellNameEnum::tryFrom(Arr::get($data, 'shell_name')) : null))
            ->when(Arr::has($data, 'record_usage_files'), fn (self $model) => $model->setRecordUsageFiles(Arr::get($data, 'record_usage_files')))
            ->when(Arr::has($data, 'default_php_version'), fn (self $model) => $model->setDefaultPhpVersion(Arr::get($data, 'default_php_version')))
            ->when(Arr::has($data, 'default_nodejs_version'), fn (self $model) => $model->setDefaultNodejsVersion(Arr::get($data, 'default_nodejs_version')))
            ->when(Arr::has($data, 'description'), fn (self $model) => $model->setDescription(Arr::get($data, 'description')));
    }
}
