<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HtpasswdUserUpdateDeprecatedRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $id, int $clusterId, string $username, int $htpasswdFileId, string $password)
    {
        $this->setId($id);
        $this->setClusterId($clusterId);
        $this->setUsername($username);
        $this->setHtpasswdFileId($htpasswdFileId);
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
        $this->setAttribute('clusterId', $clusterId);
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
            ->length(min: 1, max: 255)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($username);
        $this->setAttribute('username', $username);
        return $this;
    }

    public function getHtpasswdFileId(): int
    {
        return $this->getAttribute('htpasswdFileId');
    }

    public function setHtpasswdFileId(?int $htpasswdFileId = null): self
    {
        $this->setAttribute('htpasswdFileId', $htpasswdFileId);
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
            htpasswdFileId: Arr::get($data, 'htpasswd_file_id'),
            password: Arr::get($data, 'password'),
        ));
    }
}
