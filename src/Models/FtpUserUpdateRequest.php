<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FtpUserUpdateRequest extends CoreApiModel implements CoreApiModelContract
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

    public function getDirectoryPath(): string|null
    {
        return $this->getAttribute('directory_path');
    }

    public function setDirectoryPath(?string $directoryPath): self
    {
        $this->setAttribute('directory_path', $directoryPath);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'password'), fn (self $model) => $model->setPassword(Arr::get($data, 'password')))
            ->when(Arr::has($data, 'directory_path'), fn (self $model) => $model->setDirectoryPath(Arr::get($data, 'directory_path')));
    }
}
