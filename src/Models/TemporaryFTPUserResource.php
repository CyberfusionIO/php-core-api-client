<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TemporaryFTPUserResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $username, string $password, string $fileManagerUrl)
    {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setFileManagerUrl($fileManagerUrl);
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

    public function getPassword(): string
    {
        return $this->getAttribute('password');
    }

    /**
     * @throws ValidationException
     */
    public function setPassword(?string $password = null): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[ -~]+$/')
            ->assert($password);
        $this->setAttribute('password', $password);
        return $this;
    }

    public function getFileManagerUrl(): string
    {
        return $this->getAttribute('file_manager_url');
    }

    /**
     * @throws ValidationException
     */
    public function setFileManagerUrl(?string $fileManagerUrl = null): self
    {
        Validator::create()
            ->length(min: 1, max: 2083)
            ->assert($fileManagerUrl);
        $this->setAttribute('file_manager_url', $fileManagerUrl);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            username: Arr::get($data, 'username'),
            password: Arr::get($data, 'password'),
            fileManagerUrl: Arr::get($data, 'file_manager_url'),
        ));
    }
}
