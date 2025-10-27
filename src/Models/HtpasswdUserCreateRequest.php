<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HtpasswdUserCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $username, int $htpasswdFileId, string $password)
    {
        $this->setUsername($username);
        $this->setHtpasswdFileId($htpasswdFileId);
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
            ->length(min: 1, max: 255)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($username);
        $this->setAttribute('username', $username);
        return $this;
    }

    public function getHtpasswdFileId(): int
    {
        return $this->getAttribute('htpasswd_file_id');
    }

    public function setHtpasswdFileId(int $htpasswdFileId): self
    {
        $this->setAttribute('htpasswd_file_id', $htpasswdFileId);
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

    public static function fromArray(array $data): self
    {
        return (new self(
            username: Arr::get($data, 'username'),
            htpasswdFileId: Arr::get($data, 'htpasswd_file_id'),
            password: Arr::get($data, 'password'),
        ));
    }
}
