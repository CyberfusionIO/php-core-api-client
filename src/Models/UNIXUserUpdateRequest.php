<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\ShellNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UNIXUserUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getPassword(): string|null
    {
        return $this->getAttribute('password');
    }

    public function setPassword(?string $password): self
    {
        $this->setAttribute('password', $password);
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

    public function getShellIsNamespaced(): bool|null
    {
        return $this->getAttribute('shell_is_namespaced');
    }

    public function setShellIsNamespaced(?bool $shellIsNamespaced): self
    {
        $this->setAttribute('shell_is_namespaced', $shellIsNamespaced);
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
            ->when(Arr::has($data, 'password'), fn (self $model) => $model->setPassword(Arr::get($data, 'password')))
            ->when(Arr::has($data, 'shell_name'), fn (self $model) => $model->setShellName(Arr::get($data, 'shell_name') !== null ? ShellNameEnum::tryFrom(Arr::get($data, 'shell_name')) : null))
            ->when(Arr::has($data, 'record_usage_files'), fn (self $model) => $model->setRecordUsageFiles(Arr::get($data, 'record_usage_files')))
            ->when(Arr::has($data, 'default_php_version'), fn (self $model) => $model->setDefaultPhpVersion(Arr::get($data, 'default_php_version')))
            ->when(Arr::has($data, 'default_nodejs_version'), fn (self $model) => $model->setDefaultNodejsVersion(Arr::get($data, 'default_nodejs_version')))
            ->when(Arr::has($data, 'shell_is_namespaced'), fn (self $model) => $model->setShellIsNamespaced(Arr::get($data, 'shell_is_namespaced')))
            ->when(Arr::has($data, 'description'), fn (self $model) => $model->setDescription(Arr::get($data, 'description')));
    }
}
