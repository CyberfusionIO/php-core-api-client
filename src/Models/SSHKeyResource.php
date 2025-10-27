<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class SSHKeyResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        string $name,
        int $unixUserId,
        SSHKeyIncludes $includes,
        ?string $publicKey = null,
        ?string $privateKey = null,
        ?string $identityFilePath = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setClusterId($clusterId);
        $this->setName($name);
        $this->setUnixUserId($unixUserId);
        $this->setIncludes($includes);
        $this->setPublicKey($publicKey);
        $this->setPrivateKey($privateKey);
        $this->setIdentityFilePath($identityFilePath);
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

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getPublicKey(): string|null
    {
        return $this->getAttribute('public_key');
    }

    public function setPublicKey(?string $publicKey): self
    {
        $this->setAttribute('public_key', $publicKey);
        return $this;
    }

    public function getPrivateKey(): string|null
    {
        return $this->getAttribute('private_key');
    }

    public function setPrivateKey(?string $privateKey): self
    {
        $this->setAttribute('private_key', $privateKey);
        return $this;
    }

    public function getIdentityFilePath(): string|null
    {
        return $this->getAttribute('identity_file_path');
    }

    public function setIdentityFilePath(?string $identityFilePath): self
    {
        $this->setAttribute('identity_file_path', $identityFilePath);
        return $this;
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(string $name): self
    {
        Validator::create()
            ->length(min: 1, max: 128)
            ->regex('/^[a-zA-Z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
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

    public function getIncludes(): SSHKeyIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(SSHKeyIncludes $includes): self
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
            clusterId: Arr::get($data, 'cluster_id'),
            name: Arr::get($data, 'name'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            includes: SSHKeyIncludes::fromArray(Arr::get($data, 'includes')),
            publicKey: Arr::get($data, 'public_key'),
            privateKey: Arr::get($data, 'private_key'),
            identityFilePath: Arr::get($data, 'identity_file_path'),
        ));
    }
}
