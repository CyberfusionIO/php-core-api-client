<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BasicAuthenticationRealmResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        int $virtualHostId,
        string $name,
        int $htpasswdFileId,
        BasicAuthenticationRealmIncludes $includes,
        ?string $directoryPath = null,
        ?string $uriPath = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setClusterId($clusterId);
        $this->setVirtualHostId($virtualHostId);
        $this->setName($name);
        $this->setHtpasswdFileId($htpasswdFileId);
        $this->setIncludes($includes);
        $this->setDirectoryPath($directoryPath);
        $this->setUriPath($uriPath);
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

    public function getDirectoryPath(): string|null
    {
        return $this->getAttribute('directory_path');
    }

    public function setDirectoryPath(?string $directoryPath): self
    {
        $this->setAttribute('directory_path', $directoryPath);
        return $this;
    }

    public function getUriPath(): string|null
    {
        return $this->getAttribute('uri_path');
    }

    public function setUriPath(?string $uriPath): self
    {
        $this->setAttribute('uri_path', $uriPath);
        return $this;
    }

    public function getVirtualHostId(): int
    {
        return $this->getAttribute('virtual_host_id');
    }

    public function setVirtualHostId(int $virtualHostId): self
    {
        $this->setAttribute('virtual_host_id', $virtualHostId);
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
            ->length(min: 1, max: 64)
            ->regex('/^[a-zA-Z0-9-_ ]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
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

    public function getIncludes(): BasicAuthenticationRealmIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(BasicAuthenticationRealmIncludes $includes): self
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
            virtualHostId: Arr::get($data, 'virtual_host_id'),
            name: Arr::get($data, 'name'),
            htpasswdFileId: Arr::get($data, 'htpasswd_file_id'),
            includes: BasicAuthenticationRealmIncludes::fromArray(Arr::get($data, 'includes')),
            directoryPath: Arr::get($data, 'directory_path'),
            uriPath: Arr::get($data, 'uri_path'),
        ));
    }
}
