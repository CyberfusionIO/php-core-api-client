<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FTPUserResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $hashedPassword,
        int $clusterId,
        string $username,
        int $unixUserId,
        string $directoryPath,
        FTPUserIncludes $includes,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setHashedPassword($hashedPassword);
        $this->setClusterId($clusterId);
        $this->setUsername($username);
        $this->setUnixUserId($unixUserId);
        $this->setDirectoryPath($directoryPath);
        $this->setIncludes($includes);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(int $id): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getHashedPassword(): string
    {
        return $this->getAttribute('hashed_password');
    }

    /**
     * @throws ValidationException
     */
    public function setHashedPassword(string $hashedPassword): self
    {
        Validator::create()
            ->length(min: 1, max: 255)
            ->regex('/^[a-zA-Z0-9.\/$=*]+$/')
            ->assert($hashedPassword);
        $this->setAttribute('hashed_password', $hashedPassword);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
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

    public function getDirectoryPath(): string
    {
        return $this->getAttribute('directory_path');
    }

    public function setDirectoryPath(string $directoryPath): self
    {
        $this->setAttribute('directory_path', $directoryPath);
        return $this;
    }

    public function getIncludes(): FTPUserIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(FTPUserIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            hashedPassword: Arr::get($data, 'hashed_password'),
            clusterId: Arr::get($data, 'cluster_id'),
            username: Arr::get($data, 'username'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            directoryPath: Arr::get($data, 'directory_path'),
            includes: FTPUserIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
