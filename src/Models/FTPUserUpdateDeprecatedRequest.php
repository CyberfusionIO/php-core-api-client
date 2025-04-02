<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FTPUserUpdateDeprecatedRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        int $clusterId,
        string $username,
        int $unixUserId,
        string $directoryPath,
        string $password,
    ) {
        $this->setId($id);
        $this->setClusterId($clusterId);
        $this->setUsername($username);
        $this->setUnixUserId($unixUserId);
        $this->setDirectoryPath($directoryPath);
        $this->setPassword($password);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
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
            ->regex('/^[a-z0-9-_.@]+$/')
            ->assert($username);
        $this->setAttribute('username', $username);
        return $this;
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unixUserId');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getDirectoryPath(): string
    {
        return $this->getAttribute('directoryPath');
    }

    public function setDirectoryPath(?string $directoryPath = null): self
    {
        $this->setAttribute('directory_path', $directoryPath);
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
            ->length(min: 1, max: 255)
            ->regex('/^[ -~]+$/')
            ->assert($password);
        $this->setAttribute('password', $password);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            clusterId: Arr::get($data, 'cluster_id'),
            username: Arr::get($data, 'username'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            directoryPath: Arr::get($data, 'directory_path'),
            password: Arr::get($data, 'password'),
        ));
    }
}
