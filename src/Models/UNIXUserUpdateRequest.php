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

    public function getShellPath(): ShellPathEnum
    {
        return $this->getAttribute('shellPath');
    }

    public function setShellPath(ShellPathEnum $shellPath): self
    {
        $this->setAttribute('shellPath', $shellPath);
        return $this;
    }

    public function getRecordUsageFiles(): bool
    {
        return $this->getAttribute('recordUsageFiles');
    }

    public function setRecordUsageFiles(bool $recordUsageFiles): self
    {
        $this->setAttribute('recordUsageFiles', $recordUsageFiles);
        return $this;
    }

    public function getDefaultPhpVersion(): string|null
    {
        return $this->getAttribute('defaultPhpVersion');
    }

    public function setDefaultPhpVersion(?string $defaultPhpVersion): self
    {
        $this->setAttribute('defaultPhpVersion', $defaultPhpVersion);
        return $this;
    }

    public function getDefaultNodejsVersion(): string|null
    {
        return $this->getAttribute('defaultNodejsVersion');
    }

    public function setDefaultNodejsVersion(?string $defaultNodejsVersion): self
    {
        $this->setAttribute('defaultNodejsVersion', $defaultNodejsVersion);
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
            ->setShellPath(Arr::get($data, 'shell_path'))
            ->setRecordUsageFiles(Arr::get($data, 'record_usage_files'))
            ->setDefaultPhpVersion(Arr::get($data, 'default_php_version'))
            ->setDefaultNodejsVersion(Arr::get($data, 'default_nodejs_version'))
            ->setDescription(Arr::get($data, 'description'));
    }
}
