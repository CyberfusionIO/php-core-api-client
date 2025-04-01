<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FTPUserUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getPassword(): string
    {
        return $this->getAttribute('password');
    }

    /**
     * @throws ValidationException
     */
    public function setPassword(string $password): self
    {
        Validator::optional(Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[ -~]+$/'))
            ->assert($password);
        $this->setAttribute('password', $password);
        return $this;
    }

    public function getDirectoryPath(): string
    {
        return $this->getAttribute('directoryPath');
    }

    public function setDirectoryPath(string $directoryPath): self
    {
        $this->setAttribute('directoryPath', $directoryPath);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setPassword(Arr::get($data, 'password'))
            ->setDirectoryPath(Arr::get($data, 'directory_path'));
    }
}
