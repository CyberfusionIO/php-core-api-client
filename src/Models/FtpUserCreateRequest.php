<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FtpUserCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $username, int $unixUserId, string $password)
    {
        $this->setUsername($username);
        $this->setUnixUserId($unixUserId);
        $this->setPassword($password);
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
            ->regex('/^[a-z0-9-_.@]+$/')
            ->assert($username);
        $this->setAttribute('username', $username);
        return $this;
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(int $unixUserId): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
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
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[ -~]+$/')
            ->assert($password);
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
            username: Arr::get($data, 'username'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            password: Arr::get($data, 'password'),
        ))
            ->when(Arr::has($data, 'directory_path'), fn (self $model) => $model->setDirectoryPath(Arr::get($data, 'directory_path')));
    }
}
