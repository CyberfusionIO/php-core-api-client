<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\ShellPathEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UNIXUserUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
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

    public function getShellPath(): ShellPathEnum|null
    {
        return $this->getAttribute('shell_path');
    }

    public function setShellPath(?ShellPathEnum $shellPath): self
    {
        $this->setAttribute('shell_path', $shellPath);
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
            ->setPassword(Arr::get($data, 'password'))
            ->setShellPath(Arr::get($data, 'shell_path') !== null ? ShellPathEnum::tryFrom(Arr::get($data, 'shell_path')) : null)
            ->setRecordUsageFiles(Arr::get($data, 'record_usage_files'))
            ->setDefaultPhpVersion(Arr::get($data, 'default_php_version'))
            ->setDefaultNodejsVersion(Arr::get($data, 'default_nodejs_version'))
            ->setDescription(Arr::get($data, 'description'));
    }
}
