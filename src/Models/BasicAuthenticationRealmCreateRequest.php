<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BasicAuthenticationRealmCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $virtualHostId, string $name, int $htpasswdFileId, ?string $directoryPath = null)
    {
        $this->setVirtualHostId($virtualHostId);
        $this->setName($name);
        $this->setHtpasswdFileId($htpasswdFileId);
        $this->setDirectoryPath($directoryPath);
    }

    public function getDirectoryPath(): string|null
    {
        return $this->getAttribute('directoryPath');
    }

    public function setDirectoryPath(?string $directoryPath = null): self
    {
        $this->setAttribute('directoryPath', $directoryPath);
        return $this;
    }

    public function getVirtualHostId(): int
    {
        return $this->getAttribute('virtualHostId');
    }

    public function setVirtualHostId(?int $virtualHostId = null): self
    {
        $this->setAttribute('virtualHostId', $virtualHostId);
        return $this;
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(?string $name = null): self
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
        return $this->getAttribute('htpasswdFileId');
    }

    public function setHtpasswdFileId(?int $htpasswdFileId = null): self
    {
        $this->setAttribute('htpasswdFileId', $htpasswdFileId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            virtualHostId: Arr::get($data, 'virtual_host_id'),
            name: Arr::get($data, 'name'),
            htpasswdFileId: Arr::get($data, 'htpasswd_file_id'),
            directoryPath: Arr::get($data, 'directory_path'),
        ));
    }
}
