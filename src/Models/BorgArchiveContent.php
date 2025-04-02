<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\BorgArchiveContentObjectTypeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BorgArchiveContent extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        BorgArchiveContentObjectTypeEnum $objectType,
        string $symbolicMode,
        string $username,
        string $groupName,
        string $path,
        string $modificationTime,
        ?string $linkTarget = null,
        ?int $size = null,
    ) {
        $this->setObjectType($objectType);
        $this->setSymbolicMode($symbolicMode);
        $this->setUsername($username);
        $this->setGroupName($groupName);
        $this->setPath($path);
        $this->setModificationTime($modificationTime);
        $this->setLinkTarget($linkTarget);
        $this->setSize($size);
    }

    public function getObjectType(): BorgArchiveContentObjectTypeEnum
    {
        return $this->getAttribute('objectType');
    }

    public function setObjectType(?BorgArchiveContentObjectTypeEnum $objectType = null): self
    {
        $this->setAttribute('object_type', $objectType);
        return $this;
    }

    public function getSymbolicMode(): string
    {
        return $this->getAttribute('symbolicMode');
    }

    /**
     * @throws ValidationException
     */
    public function setSymbolicMode(?string $symbolicMode = null): self
    {
        Validator::create()
            ->length(min: 10, max: 10)
            ->regex('/^[rwx\+\-dlsStT]+$/')
            ->assert($symbolicMode);
        $this->setAttribute('symbolic_mode', $symbolicMode);
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
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($username);
        $this->setAttribute('username', $username);
        return $this;
    }

    public function getGroupName(): string
    {
        return $this->getAttribute('groupName');
    }

    /**
     * @throws ValidationException
     */
    public function setGroupName(?string $groupName = null): self
    {
        Validator::create()
            ->length(min: 1, max: 32)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($groupName);
        $this->setAttribute('group_name', $groupName);
        return $this;
    }

    public function getPath(): string
    {
        return $this->getAttribute('path');
    }

    public function setPath(?string $path = null): self
    {
        $this->setAttribute('path', $path);
        return $this;
    }

    public function getLinkTarget(): string|null
    {
        return $this->getAttribute('linkTarget');
    }

    public function setLinkTarget(?string $linkTarget = null): self
    {
        $this->setAttribute('link_target', $linkTarget);
        return $this;
    }

    public function getModificationTime(): string
    {
        return $this->getAttribute('modificationTime');
    }

    public function setModificationTime(?string $modificationTime = null): self
    {
        $this->setAttribute('modification_time', $modificationTime);
        return $this;
    }

    public function getSize(): int|null
    {
        return $this->getAttribute('size');
    }

    public function setSize(?int $size = null): self
    {
        $this->setAttribute('size', $size);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            objectType: BorgArchiveContentObjectTypeEnum::tryFrom(Arr::get($data, 'object_type')),
            symbolicMode: Arr::get($data, 'symbolic_mode'),
            username: Arr::get($data, 'username'),
            groupName: Arr::get($data, 'group_name'),
            path: Arr::get($data, 'path'),
            modificationTime: Arr::get($data, 'modification_time'),
            linkTarget: Arr::get($data, 'link_target'),
            size: Arr::get($data, 'size'),
        ));
    }
}
